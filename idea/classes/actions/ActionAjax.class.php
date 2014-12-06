<?php

/**
 * ActionAjax.class.php
 * Файл экшена плагина Idea
 *
 * @author      Андрей Воронов <andreyv@gladcode.ru>
 * @copyrights  Copyright © 2014, Андрей Воронов
 *              Является частью плагина Idea
 * @version     0.0.1 от 05.12.2014 23:51
 */
class PluginIdea_ActionAjax extends PluginIdea_Inherit_ActionAjax {

    protected function RegisterEvent() {
        parent::RegisterEvent();
        $this->AddEvent('idea_save', 'EventIdeaSave');
    }

    /**
     * Вывод информации о блоге
     */
    protected function EventIdeaSave() {

        // * Если блог существует и он не персональный
        if (!(is_string(F::GetRequest('text')))) {
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'));

            return;
        }

        // * Если пользователь не авторизован
        if (!E::IsUser()) {
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'));

            return;
        }

        // Если есть временной ключ, то привяжем картинку к новому объекту
        if ($sTargetTmp = E::Session_GetCookie('uploader_target_tmp')) {

            // Для этого создадим новый объект
            /** @var PluginIdea_ModuleIdea_EntityIdea $oIdea */
            $oIdea = Engine::GetEntity('PluginIdea_ModuleIdea_EntityIdea', array(
                'idea_user_id' => E::UserId(),
                'idea_link' => '',
                'idea_text' => F::GetRequest('text'),
            ));

            // Добавим его в БД, получив при этом его Id
            $oIdea->Add();

            // Выделем ид. объекта и название объекта в переменные
            $sTargetId = $oIdea->getIdeaId();
            $sTargetType = 'plugin.idea.name';

            // Привяжем картинку к объекту
            if ($oResource = $this->Mresource_LinkTempResource($sTargetId, $sTargetType, $sTargetTmp)) {

                // Привяжем картинки в тексте к этому объекту
                $this->Mresource_CheckTargetTextForImages($sTargetType . '_text', $sTargetId, $oIdea->getIdeaText());

                // Добавим в объект id картинки и сохраним его
                $oIdea->setIdeaLink($oResource);
                $oIdea->Update($oResource->getMresourceId());
            }
        }


        // * Устанавливаем переменные для ajax ответа
        $this->Message_AddNoticeSingle($this->Lang_Get('plugin.idea.ok'), $this->Lang_Get('attention'));
        $this->Viewer_AssignAjax('sCookie', F::RandomStr());
    }
}