<template>
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-lg-6">
	    		<h1>Jakiej usługi szukasz?</h1>
	    		<p>Staramy się abyś znalazł w naszym serwisie fachowca, który spełni Twoje oczekiwania.</p>
	    	</div>
	    	<div class="col-lg-6">
	    		<img src="/img/janusz.png" />
	    	</div>
    	</div>

    	<form id="wyszukiwarka" class="form-inline col-lg-12">
    		<div class="col-lg-12 form-inline">
	    		<input type="text" class="col-lg-6 form-control mb-2 mr-sm-0 mb-sm-0" id="szukajZlecen" placeholder="Jakiej usługi szukasz?">
	    		<input type="text" class="col-lg-4 form-control mb-2 mr-sm-0 mb-sm-0" id="SzukajLokalizacji" placeholder="Miejscowość lub Województwo">
	    		<button id="szukaj" class="btn btn-primary col-lg-2"><i class="fa fa-search" aria-hidden="true"></i> Szukaj</button>
    		</div>
    	</form>
		
		<ul id="example-1">
			<li v-for="zlecenie in zlecenia">
			{{ zlecenie.nazwa }}
			</li>
		</ul>
    </div>
</template>

<script src="./Home_Code.vue"></script>