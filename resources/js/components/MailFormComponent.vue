<template>
<div>
    <transition name="fade">
        <mail-alert @closeAlert="closeAlert" v-if="success"></mail-alert>
    </transition>

    <form method="POST" v-on:submit.prevent="newMail">
        <div class="form-body">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="form-group">
                        <label for="from">De:</label>
                        <input type="email" id="from" name="from" class="form-control w-60" v-model="from" required />
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="form-group">
                        <label for="to">Para:</label>
                        <input type="email" id="to" name="to" class="form-control w-60" v-model="to" required />
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="form-group">
                        <label for="subject">Asunto:</label>
                        <input type="text" id="subject" name="subject" class="form-control" v-model="subject" required />
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="form-group">
                        <label for="message">Escriba su mensaje:</label>
                        <div>
                            <vue-editor :customModules="customModulesForEditor" required ref="message" name="message" :editorOptions="editorSettings" useCustomImageHandler @image-added="handleImageAdded" v-model="message" />
                        </div>
                    </div>
                </div>

                <div class="col-md-10">
                    <label for="plantilla">Plantillas:</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" v-on:click="openModal" class="input-group-text btn btn-success">Agregar</button>
                            </div>
                            <select v-model="selected" v-on:change="setTemplate" class=" form-control w-45" name="plantilla" id="plantilla">
                                <option></option>
                                <option v-bind:value="template.message" v-for="(template, index) in templates" :template="template">{{template.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="text-right">

                    <button type="submit" class="btn btn-success">
                        <span v-if="sending" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Enviar mensajes
                    </button>

                    <button type="reset" ref="cleanBtn" class="btn btn-dark">
                        Limpiar campos
                    </button>
                </div>
            </div>
        </div>
        <template-modal @newTemplate="addTemplate"></template-modal>
    </form>
</div>
</template>

<script>
import {VueEditor,Quill } from "vue2-editor";
import {ImageDrop} from "quill-image-drop-module";
import ImageResize from "quill-image-resize-module";
Quill.register("modules/imageResize", ImageResize);

Quill.register("modules/imageDrop", ImageDrop);


export default {
    components: {
        VueEditor
    },
    data() {
        return {
             customModulesForEditor: [
        { alias: "imageDrop", module: ImageDrop },
        { alias: "imageResize", module: ImageResize }
      ],
            sending: false,
            success: false,
            selected: "",
            content: "",
            to: "",
            from: "",
            subject: "",
            message: "",
            mails: [],
            templates: [],
            editorSettings: {
                modules: {
                    imageDrop: true,
                   imageResize: {}
                }
            }

        };
    },
    created() {

        axios.get('/template/index')
            .then(res => {

                this.templates = res.data;

            })
            .catch(err => {
                console.error(err);
            })

    },
    methods: {
        newMail: function () {
            let cleanBtn = this.$refs.cleanBtn;
            let textarea = this.$refs.message;

            const params = {
                from: this.from,
                to: this.to,
                subject: this.subject,
                message: this.message,
            };

            this.sending = true;
            axios.post('/sendmail', {
                    to: this.to,
                    from: this.from,
                    subject: this.subject,
                    message: this.message,
                })
                .then(res => {

                    cleanBtn.click();
                    this.sending = false;
                    this.success = true;
                    alert('Mensaje Enviado Exitosamente!');

                })
                .catch(err => {
                    alert("ERROR");
                    cleanBtn.click();
                })

        },

        openModal: function () {
            $("#exampleModal").modal("show");
        },

        addTemplate: function (name) {

            axios.post('/template', {
                    name: name,
                    message: this.message
                })
                .then(res => {
                    console.log(res);
                    this.templates.push(res.data);
                    alert('Plantilla Añadida');
                })
                .catch(err => {
                    console.error(err);
                    alert("Error en cargar plantilla: " + err);
                })

        },

        setTemplate: function () {
            this.message = this.selected;

        },
        closeAlert: function () {
            this.success = false;
            console.log('se cerro la notificación');
        },
        handleImageAdded: function (file, Editor, cursorLocation, resetUploader) {
            // An example of using FormData
            // NOTE: Your key could be different such as:
            // formData.append('file', file)

            var formData = new FormData();
            formData.append("image", file);

            axios({
                    url: "/sendmail/image",
                    method: "POST",
                    data: formData
                })
                .then(result => {
                    let url = result.data.url; // Get url from response
                    Editor.insertEmbed(cursorLocation,"image",url);
                    resetUploader();
                    console.log(result.data);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },

};
</script>
