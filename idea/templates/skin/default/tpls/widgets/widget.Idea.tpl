{* Тема оформления Experience v.1.0  для Alto CMS      *}
{* @licence     CC Attribution-ShareAlike   *}

{$sTargetId=0}
{$sTargetType='plugin.idea.name'}

{include_once file='commons/common.editor.tpl' sSettingsMarkitup='ls.settings.getMarkitupComment()'}

<div class="panel panel-default widget widget-type-blog">
    <div class="panel-body">
        <header class="widget-header">
            <h3 class="widget-title">{$aLang.plugin.idea.widget}</h3>
        </header>

        <div class="widget-content">
            <div class="form-group">
                <label for="topic_text">{$aLang.plugin.idea.text}</label>
                <textarea name="idea_text" id="idea_text" rows="4"class="form-control js-editor-wysiwyg js-editor-markitup"></textarea>
            </div>

            <label for="topic_text">{$aLang.plugin.idea.photo}</label>

            {* БЛОК ЗАГРУЗКИ ИЗОБРАЖЕНИЯ *}
            <div class              ="js-alto-uploader"
                 data-target        ="{$sTargetType}"
                 data-target-id     ="{$sTargetId}"
                 data-title         ="{$aLang.plugin.idea.title}"
                 data-help          ="{$aLang.plugin.idea.help}"
                 data-empty         ="{asset file="img/empty_blog_image.png" theme=true}"
                 data-preview-crop  ="309x309crop"
                 data-crop          ="yes">

                {* Картинка фона блога *}
                {img attr=[
                    'src'           => "{asset file="img/empty_blog_image.png" theme=true}",
                    'alt'           => "image",
                    'class'         => "thumbnail js-uploader-image",
                    'target-type'   => "{$sTargetType}",
                    'crop'          => '309x309crop',
                    'target-id'     => "{$sTargetId}"
                ]}

                {* Меню управления аватаром блога *}
                <div class="uploader-actions text-center">

                    {* Кнопка загрузки картинки *}
                    <a class="btn btn-default btn-xs js-uploader-button-upload" href="#" onclick="return false">
                        {$aLang.uploader_image_upload}
                    </a>

                    {* Кнопка удаления картинки *}
                    <br/>
                    <a href="#" onclick="return false;" class="link-dotted js-uploader-button-remove" {if !$bImageIsTemporary}style="display: none;"{/if}>
                        {$aLang.uploader_image_delete}
                    </a>

                    {* Файл для загрузки *}
                    <input type="file" name="uploader-upload-image" class="uploader-actions-file js-uploader-file">

                </div>

                {* Форма обрезки картинки при ее загрузке *}
                {include_once file="modals/modal.crop_img.tpl"}

            </div>
        </div>
        <br/><br/>
        <button type="button" onclick="ls.idea.save();"
                class="btn btn-default js-button-preview">{$aLang.plugin.idea.button_send}</button>

    </div>
</div>