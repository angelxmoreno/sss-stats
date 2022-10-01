<?php

namespace App\View;

use Cake\View\Exception\SerializationFailureException;
use Cake\View\View;

class JsonPlusView extends View
{
    public function render(?string $template = null, $layout = null): string
    {
        try {
            $this->response = $this->response->withType('application/json');
            $paging = $this->getRequest()->getAttribute('paging', false);
            if ($paging) {
                return json_encode([
                    'pagination' => array_pop($paging),
                    'items' => array_pop($this->viewVars),
                ]);
            }
            return json_encode($this->viewVars);
        } catch (\Exception | \TypeError $e) {
            throw new SerializationFailureException(
                'Serialization of View data failed.',
                null,
                $e
            );
        }
    }
}
