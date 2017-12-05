<template>
    <section id="glowna">
        <div class="sekcja">
            <div class="container">
            	<div class="row justify-content-center">
                    <div class="offset-lg-1"></div>
            		<div class="col-lg-1 janusz">
                        <img src="/img/janusz.png" />
                    </div>
                    <div class="col-lg-8 naglowek">
        	    		<h1>Jakiej usługi szukasz?</h1>
                        <br/>
        	    		<p>Staramy się abyś znalazł w naszym serwisie fachowca, który spełni Twoje oczekiwania.</p>
        	    	</div>
                    <div class="offset-lg-1"></div>
            	</div>

                <div id="wyszukiwarka" class="col-lg-12">
                	<form class="form-inline">
                		<div class="col-lg-12 form-inline">
            	    		<input type="text" class="col-lg-6 form-control mb-2 mr-sm-0 mb-sm-0" id="szukajZlecen" placeholder="Jakiej usługi szukasz?">
            	    		<input type="text" class="col-lg-4 form-control mb-2 mr-sm-0 mb-sm-0" id="SzukajLokalizacji" placeholder="Miejscowość lub Województwo">
            	    		<button id="szukaj" class="btn btn-primary col-lg-2"><i class="fa fa-search" aria-hidden="true"></i> Szukaj</button>
                		</div>
                	</form>
                </div>
            </div>
        </div>
		<div class="sekcja">
            <div class="container">
                <div class="row justify-content-center">
        			<div class="col-lg-2 ml-4 mr-4 mb-2 kategoria" v-for="kategoria in data.kategorie">
        			{{ kategoria.nazwa }}
        			</div>
        		</div>
            </div>
        </div>
    </section>
</template>

<script src="./Home_Code.vue"></script>