<?php
declare(strict_types=1);

namespace customiesdevs\customies;

use customiesdevs\customies\block\CustomiesBlockFactory;
use customiesdevs\customies\item\CustomiesItemFactory;
use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\network\mcpe\protocol\BiomeDefinitionListPacket;
use pocketmine\network\mcpe\protocol\ItemRegistryPacket;
use pocketmine\network\mcpe\protocol\ItemStackRequestPacket;
use pocketmine\network\mcpe\protocol\ItemStackResponsePacket;
use pocketmine\network\mcpe\protocol\CreativeContentPacket;
use pocketmine\network\mcpe\protocol\ItemComponentPacket;
use pocketmine\network\mcpe\protocol\ResourcePackStackPacket;
use pocketmine\network\mcpe\protocol\StartGamePacket;
use pocketmine\network\mcpe\protocol\types\BlockPaletteEntry;
use pocketmine\network\mcpe\protocol\types\Experiments;
use pocketmine\network\mcpe\protocol\types\ItemTypeEntry;
use function array_merge;
use function count;

#[\AllowDynamicProperties]
final class CustomiesListener implements Listener {

	/** @var ItemTypeEntry[] */
	private array $cachedItemTable = [];
	/** @var BlockPaletteEntry[] */
	private array $cachedBlockPalette = [];
	private Experiments $experiments;

	public function __construct() {
		$this->experiments = new Experiments([
			"data_driven_items" => true,
		], true);
	}

	public function onDataPacketSend(DataPacketSendEvent $event): void {
		foreach($event->getPackets() as $packet){
			if($packet instanceof ItemRegistryPacket) {
				if($this->cachedItemTable === []) {
					$this->cachedItemTable = CustomiesItemFactory::getInstance()->getItemTableEntries();
				}
				(function() : void{
					/** @noinspection PhpDynamicFieldDeclarationInspection */
					/** @noinspection PhpUndefinedFieldInspection */
					$this->entries = array_merge($this->entries, CustomiesItemFactory::getInstance()->getItemTableEntries());
				})->call($packet);
			}elseif($packet instanceof StartGamePacket) {
				if(count($this->cachedItemTable) === 0) {
					$this->cachedItemTable = CustomiesItemFactory::getInstance()->getItemTableEntries();
					$this->cachedBlockPalette = CustomiesBlockFactory::getInstance()->getBlockPaletteEntries();
				}
				$packet->levelSettings->experiments = $this->experiments;
				// $packet->itemTable = array_merge($packet->itemTable, $this->cachedItemTable);
				$packet->blockPalette = $this->cachedBlockPalette;
			} elseif($packet instanceof ResourcePackStackPacket) {
				$packet->experiments = $this->experiments;
			}
		}
	}
}