<?php

/**
 * ActionIdea.class.php
 * Файл экшена плагина Idea
 *
 * @author      Андрей Воронов <andreyv@gladcode.ru>
 * @copyrights  Copyright © 2014, Андрей Воронов
 *              Является частью плагина Idea
 * @version     0.0.1 от 27.10.2014 8:50
 */
class PluginIdea_ActionIdea extends ActionPlugin {

    /**
     * Абстрактный метод инициализации экшена
     *
     */
    public function Init() {
        // TODO: Implement Init() method.
    }

    /**
     * Абстрактный метод регистрации евентов.
     * В нём необходимо вызывать метод AddEvent($sEventName,$sEventFunction)
     */
    protected function RegisterEvent() {
        $this->AddEventPreg('/^\d+$/i', 'EventIdeaShow');
    }

    /**
     * Завершение работы экшена
     */
    public function EventIdeaShow() {

        $this->SetTemplateAction('show');

        // Получим объект по его ид.
        $oIdea = $this->PluginIdea_Idea_GetIdeaById($this->sCurrentEvent);

        if ($oIdea) {

            // Получим картинку нужного размера от ресурса
            $sUrl = $this->Uploader_GetTargetImageUrl($oIdea->getIdeaId(), 'plugin.idea.name', '200x200fit');
            $oIdea->setIdeaUrl($sUrl);

            $this->Viewer_Assign('oIdea', $oIdea);
        }


    }

}