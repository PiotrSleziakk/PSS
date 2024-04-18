{extends file="../templates/main.html"}

{block name=content}
                 <!-- Content -->
                <div class="content">
                    <form class="pure-form pure-form-stacked" action="{$conf->app_url}/app/calc.php" method="post">
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
                                                <li><input type="submit" class="special" value="Oblicz" /></li>
                                        </ul>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()}
        <h4>Wystąpiły błędy: </h4>
        <ol class="err">
        {foreach $msgs->getErrors() as $err}
        {strip}
            <li>{$err}</li>
        {/strip}
        {/foreach}
        </ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Miesięczna rata wynosi:</h4>
	<p class="res">
	{$res->result}
	</p>
{/if}

</div>
</div>

{/block}