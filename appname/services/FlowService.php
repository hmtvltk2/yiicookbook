<?php

namespace appname\services;

use appname\models\Flow;
use appname\models\Node;
use appname\models\Transition;

class FlowService
{
    public static function importFlow($json)
    {
        // create flow
        $flow = new Flow();
        $flow->name = $json['name'];
        $flow->status = 1;
        if ($flow->save()) {
            // create nodes
            foreach ($flow['nodes'] as $jsonNode) {
                $node = new Node();
                $node->flow_id = $flow->id;
                $jsonNode['code'] = $jsonNode['code'] . $flow->id;
                $node->setAttributes($jsonNode);
                $node->save();

                // create transitions
                foreach ($jsonNode['next'] as $next) {
                    $transition = new Transition();
                    $transition->start_node = $node->code;
                    $transition->end_node = $next . $flow->id;
                    $transition->save();
                }
            }
        }
    }

    public static function importFlowFromFile($path)
    {
        $jsonData = file_get_contents($path);
        $json = json_decode($jsonData);
        return static::importFlow($json);
    }
}
