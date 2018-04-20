<?php
namespace RearEngine\Controller\Component;

use Cake\Event\Event;
use Search\Controller\Component\PrgComponent as BasePrgComponent;

class PrgComponent extends BasePrgComponent
{

    public function beforeRender()
    {
        $parameters = [];
        $controller = $this->_registry->getController();
        if($this->_actionCheck()){
            foreach($this->config('actions') as $key=>$models){
                if(is_int($key)){
                    continue;
                }
                if(is_string($models)){
                    $models = [$models];
                }
                foreach($models as $model){
                    $filters = $controller->$model->searchManager()->getFilters();
                    foreach($filters as $key=>$filter){
                        $parameters[$filter->name()] = [];
                        if($filter->config('options')){
                            $parameters[$filter->name()] = $filter->config('options');
                        }
                    }
                }
            }
            $controller->set('prgSearchParameters', $parameters);
        }
    }

    /**
     * Checks if the action should be processed by the component.
     *
     * @return bool
     */
    protected function _actionCheck()
    {
        $actions = $this->config('actions');
        if (is_bool($actions)) {
            return $actions;
        }
        if (is_string($actions)) {
            $actions = [$actions];
        }
        if(count(array_filter(array_keys($actions), 'is_string')) > 0){
            $_actions = [];
            foreach($actions as $key=>$value){
                if(is_string($key)){
                    $_actions[] = $key;
                } else {
                    $_actions[] = $value;
                }
            }
            $actions = $_actions;
        }
        return in_array($this->request->action, $actions);
    }
}
