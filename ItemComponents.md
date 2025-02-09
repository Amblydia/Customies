# ItemComponents Known (1.21.30)
Tested in pocketmine with customies
(they work in vanilla)

## Components

- `minecraft:block_placer` [Not Tested]
```
 "minecraft:block_placer": {
    "block": "cake",
    "use_on": ["stone", "grass]
 }
```

- `minecraft:cooldown` [Not Tested]
```
"minecraft:cooldown":{
    "category": "attack",
    "duration": 20.0
}
```

- `minecraft:dyeable` [Not Tested]
```
"minecraft:dyeable": {
    "default_color":  "#175882"
}
```

- `minecraft:digger` [Tested]
```
"minecraft:digger": {
	"use_efficiency": true,
	"destroy_speeds": [
		{
			"block": {
				"tags": "q.any_tag('stone', 'metal')" // Note that not all blocks have tags; listing many blocks may be necessary
			},
			"speed": 6
		}
	]
}
```

- `minecraft:display_name` [Tested]
```
"minecraft:display_name": {
    "value": "secret_weapon"
}
```

- `minecraft:durability` [Not Tested]
```
"minecraft:durability": {
    "damage_chance": {
        "min": 100,
        "max": 100
    },
    "max_durability": 100
}
```

- `minecraft:entity_placer` [Not Tested]
```
"minecraft:entity_placer": {
    "entity": "minecraft:spider",
    "dispense_on": [
        "minecraft:dirt"
    ],
    "use_on": [
        "minecraft:dirt"
    ]
}
```

- `minecraft:food` [Tested]
```
"minecraft:food": {
    "can_always_eat": false,
    "nutrition": 3,
    "saturation_modifier": 0.6,
    "using_converts_to": ""
}
```

- `minecraft:fuel` [Not Tested]
```
"minecraft:fuel": {
    "duration": 3.0
}
```

- `minecraft:glint` [Tested]
```
"minecraft:glint": {
    "value": false
}
```

- `minecraft:hover_text_color` [Not Tested]
[Valid Colors](https://minecraft.wiki/w/Formatting_codes#Color_codes)
```
"minecraft:hover_text_color": "minecoin_gold"
```

- `minecraft:interact_button` [Not Tested]
```
"minecraft:interact_button": {
    "value": true
}
// OR
"minecraft:interact_button": "Use This Custom Item"
```

- `minecraft:projectile` [Not Tested]
```
"minecraft:projectile": {
    "minimum_critical_power": 1.25,
    "projectile_entity": "arrow"
}
```

- `minecraft:rarity` [Not Tested]
```
"minecraft:rarity": "rare"
```

- `minecraft:record` [Not Tested]
[List of SoundEvents](https://learn.microsoft.com/en-us/minecraft/creator/reference/content/itemreference/examples/itemcomponents/minecraft_record?view=minecraft-bedrock-stable)
`"13", "cat", "blocks", "chirp", "far", "mall", "mellohi", "stal", "strad", "ward", "11", "wait", "pigstep"`
```
"minecraft:record": {
    "comparator_signal": 1,
    "duration": 5,
    "sound_event": "ambient.tame"
}
```

- `minecraft:repairable` [Not Tested]
```
"minecraft:repairable":{
    "repair_items": [
        {
            "items":[
                "minecraft:diamond"
            ],
            "repair_amount": [
                "expression" => 10.0000,
				"version" => 0
			]
            // OR
            "repair_amount": "math.random(1,10)"
        }
    ]
}
```

- `minecraft:shooter` [Not Tested]
```
"minecraft:shooter": {
    "ammunition": [
        {
            "item": "custom_projectile",
            "use_offhand": true,
            "search_inventory": true,
            "use_in_creative": true
        }
    ],
    "max_draw_duration": 1.0,
    "scale_power_by_draw_duration": true,
    "charge_on_draw": false
}
```

- `minecraft:tags` [Not Tested]
```
"minecraft:tags": {
    "tags": [
        "is_food"
    ]
}
```

- `minecraft:throwable` [Not Tested]
```
"minecraft:throwable": {
    "do_swing_animation": false,
    "launch_power_scale": 1.0,
    "max_draw_duration": 0.0,
    "max_launch_power": 1.0,
    "min_draw_duration": 0.0,
    "scale_power_by_draw_duration": false
}
```

- `minecraft:use_modifiers` [Not Tested]
```
"minecraft:use_modifiers": {
    "movement_modifier": 0.5,
    "use_duration": 1.0
}
```

- `minecraft:wearable` [Not Tested]
```
"minecraft:wearable": {
    "slot": "slot.armor.chest",
    "protection": 10
}
```

## Component Properties

- `allow_off_hand` [Not Tested]

- `can_destroy_in_creative` [Not Tested]

- `creative_category` [Not Tested]

- `creative_group` [Not Tested]

- `damage` [Not Tested]

- `enchantable_slot` [Not Tested]

- `enchantable_value` [Not Tested]

- `foil` [Tested]

- `frame_count` [Not Tested]

- `hand_equipped` [Not Tested]

- `minecraft:icon` [Tested] (For some reason this works as a property)
```
"minecraft:icon":{
    "textures": {
        "default": "custom_item"
    }
}
```

- `liquid_clipped` [Not Tested]

- `max_stack_size` [Tested]

- `mining_speed` [Not Tested]

- `should_despawn` [Not Tested]

- `stacked_by_data` [Not Tested]

- `use_animation` [Tested]

- `use_duration` [Not Tested]
