<template>
    <div class="container">
    	<form class="form-inline">
    		<div class="col-lg-4">
    			<input type="text" class="form-control" id="szukajZlecen" aria-describedby="wyszukiwarka" placeholder="Jakiej usługi szukasz?">
    		</div>
    		<div class="col-lg-4">
    			<input type="text" class="form-control" id="szukajLokalizacji" aria-describedby="wyszukiwarka" placeholder="Miejscowość lub Województwo">
    		</div>
    		<div class="col-lg-4">
    			<button>Test</button>
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