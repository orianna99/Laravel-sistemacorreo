<template>
<div>

<div class="alert alert-success alert-dismissible fade show" role="alert">
         Su mensaje se ha enviado <strong>Exitosamente!</strong> 
        <button v-on:click="close" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

   
</template>

<script>
export default {
methods: {
  close: function (){

    this.$emit('closeAlert');
  }

},
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}
</style>
