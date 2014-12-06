<?php

/**
 * Uploader.class.php
 * Файл модуля Uploader плагина Idea
 *
 * @author      Андрей Воронов <andreyv@gladcode.ru>
 * @copyrights  Copyright © 2014, Андрей Воронов
 *              Является частью плагина Idea
 * @version     0.0.1 от 05.12.2014 23:17
 */
class PluginIdea_ModuleUploader extends PluginIdea_Inherit_ModuleUploader {

    /**
     * Получает урл цели
     *
     * @param string $sTargetId
     * @param string $sTarget
     * @return string
     */
    public function GetTargetUrl($sTargetId, $sTarget) {

        if ($sTarget == 'plugin.idea.name') {
            return Router::GetPath('idea') . '/' . $sTargetId;
        }

        return parent::GetTargetUrl($sTargetId, $sTarget);
    }


    /**
     * Проверяет доступность того или иного целевого объекта, переопределяется
     * плагинами. По умолчанию всё грузить запрещено.
     * Если всё нормально и пользователю разрешено сюда загружать картинки,
     * то метод возвращает TRUE, иначе значение FALSE.
     *
     * @param string $sTarget
     * @param int|bool $sTargetId
     * @return bool
     */
    public function CheckAccessAndGetTarget($sTarget, $sTargetId = FALSE) {

        if ($sTarget == 'plugin.idea.name') {
            return E::IsUser();
        }

        return parent::GetTargetUrl($sTargetId, $sTarget);
    }

}