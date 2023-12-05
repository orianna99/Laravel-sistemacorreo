<template>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar plantilla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form v-on:submit.prevent="add">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre de la Plantilla:</label>
                        <input type="text" name="name" class="form-control" id="recipient-name" v-model="name">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Guardar pantilla</button>
                            <button type="button" class="btn btn-secondary" ref="closeBtn" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
        }
    },
    methods: {
        add: function () {
            var closeBtn = this.$refs.closeBtn;
            this.$emit('newTemplate', this.name);
            closeBtn.click();

        }
    },
};
</script>
