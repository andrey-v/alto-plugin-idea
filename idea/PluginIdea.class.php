<?php
/** Запрещаем напрямую через браузер обращение к этому файлу.  */
if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

/**
 * PluginIdea.class.php
 * Файл основного класса плагина Idea
 *
 * @author      Андрей Воронов <andreyv@gladcode.ru>
 * @copyrights  Copyright © 2014, Андрей Воронов
 *              Является частью плагина Idea
 *
 * @method void Viewer_AppendStyle
 * @method void Viewer_AppendScript
 * @method void Viewer_Assign
 *
 * @version     0.0.1 от $DATE$
 */
class PluginIdea extends Plugin {

    /** @var array $aDelegates Объявление делегирований */
    protected $aDelegates = array(
        'template' => array(),
    );

    /** @var array $aInherits Объявление переопределений (модули, мапперы и сущности) */
    protected $aInherits = array(
        'actions' => array('ActionAjax',),
        'modules' => array('ModuleUploader'),
    );

    /**
     * Активация плагина
     * @return bool
     */
    public function Activate() {
        if (!$this->isTableExists('prefix_idea')) {
            $this->ExportSQL(dirname(__FILE__) . '/sql/install.sql');
        }

        return TRUE;
    }

    /**
     * Деактивация плагина
     * @return bool
     */
    public function Deactivate() {
        return TRUE;
    }

    /**
     * Инициализация плагина
     */
    public function Init() {
        $this->Viewer_AppendScript(Plugin::GetTemplatePath(__CLASS__) . "/assets/js/script.js"); // Добавление своего JS
    }

}
