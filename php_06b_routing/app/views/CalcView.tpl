{extends file="main.tpl"}
   
{block name=content}

<!-- Content -->

<div class="content">
    <form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
        <fieldset>
            <div class="row gtr-50">
                <div class="col-4 col-12-mobile">
                    <input id="id_amount" type="text" name="amount" placeholder="Kwota" value="{$form->amount}" />
                </div>
                <div class="col-4 col-12-mobile">
                    <input id="id_years" type="text" name="years" placeholder="Na ile lat" value="{$form->years}" />
                </div>
                <div class="col-4 col-12-mobile">
                    <input id="id_interest" type="text" name="interest" placeholder="Oprocentowanie" value="{$form->interest}" />
                </div>
                <div class="col-12">
                        <ul class="buttons">
                                <li><input type="submit" class="button primary" value="Oblicz" /></li>
                        </ul>
                </div>
            </div>
        </fieldset>
    </form>
</div>

{include file='messages.tpl'}
                                    
{if isset($res->result)}
<div class="messages inf">
	Wynik: {$res->result}
</div>
{/if}

</div>
</div>

{/block}