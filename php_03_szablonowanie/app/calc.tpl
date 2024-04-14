{extends file="../templates/main.html"}

{block name=content}
                 <!-- Content -->
                <div class="content">
                    <form class="pure-form pure-form-stacked" action="{$app_url}/app/calc.php" method="post">
                        <fieldset>
                            <div class="row gtr-50">
                                <div class="col-4 col-12-mobile">
                                    <input id="id_amount" type="text" name="amount" placeholder="Kwota" value="{if isset($amount)}{$amount}{/if}" />
                                </div>
                                <div class="col-4 col-12-mobile">
                                    <input id="id_years" type="text" name="years" placeholder="Na ile lat" value="{if isset($years)}{$years}{/if}" />
                                </div>
                                <div class="col-4 col-12-mobile">
                                    <input id="id_interest" type="text" name="interest" placeholder="Oprocentowanie" value="{if isset($interest)}{$interest}{/if}" />
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
{if isset($messages)}
	{if count($messages) > 0} 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if isset($infos)}
	{if count($infos) > 0} 
		<h4>Informacje: </h4>
		<ol class="inf">
		{foreach  $infos as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($result)}
	<h4>Miesięczna rata wynosi:</h4>
	<p class="res">
	{$result}
	</p>
{/if}

</div>
</div>

{/block}