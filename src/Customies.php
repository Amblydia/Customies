<?php
declare(strict_types=1);

namespace customiesdevs\customies;

use customiesdevs\customies\block\CustomiesBlockFactory;
use customiesdevs\customies\example\ExampleBlock;
use customiesdevs\customies\example\ExampleItem;
use customiesdevs\customies\item\CreativeInventoryInfo;
use customiesdevs\customies\item\CustomiesItemFactory;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;
use pocketmine\utils\SingletonTrait;

final class Customies extends PluginBase {
	use SingletonTrait;

	public function onLoad(): void{
		self::setInstance($this);
	}

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents(new CustomiesListener(), $this);

		CustomiesBlockFactory::getInstance()->registerBlock(
			static fn() => new ExampleBlock(),
			"customies:example_block",
			new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_ITEMS)
		);

		CustomiesItemFactory::getInstance()->registerItem(
			fn() => new ExampleItem(),
			"customies:example_item",
			new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_ITEMS)
		);

		$this->getScheduler()->scheduleDelayedTask(new ClosureTask(static function (): void {
			// This task is scheduled with a 0-tick delay so it runs as soon as the server has started. Plugins should
			// register their custom blocks and entities in onEnable() before this is executed
			CustomiesBlockFactory::getInstance()->addWorkerInitHook();
		}), 0);
	}
}