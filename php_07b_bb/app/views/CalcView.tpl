{extends file="main.tpl"}

{block name=footer}Super ważna stopka!{/block}


{block name=content}
    
    <div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>


<h3>Kalkulator kredytowy</h2>


<form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
		<fieldset>
		<label for="cr_amt">Kwota</label>
                <input id="cr_amt" type="text" placeholder="super kwota" name="cr_amt" value="{$form->cr_amt}">
                <label for="year">Liczba lat</label>
                <input id="year" type="text" placeholder="super liczba lat" name="year" value="{$form->year}">
                <label for="rate">Oprocentowanie</label>
                <input id="rate" type="text" placeholder="super malutkie oprocentowanie" name="rate" value="{$form->rate}">
	</fieldset>
	<button type="submit" class="pure-form pure-form-stacked">Oblicz miesięczną rate</button>
</form>

<div class="messages">

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
	<h4>Miesięczna rata</h4>
	<p class="res">
	{$res->result}
	</p>
{/if}

</div>

{/block}