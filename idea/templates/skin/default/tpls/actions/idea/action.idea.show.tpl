{extends file='_index.tpl'}

{block name="layout_content"}

    {if $oIdea}

        <div class="row">
            <div class="col-md-3">
                <img style="width: 100%;" src="{$oIdea->getIdeaUrl()}" alt="idea_image"/>
            </div>
            <div class="col-md-9">{$oIdea->getIdeaText()}</div>
        </div>

    {/if}

{/block}

