<template>
<div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">اختيار تصنيف الخبر</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="type" class='form-control' v-model='type' @change='changeType()'>
                            <option value='general'>خاص بالجامعة</option>
                            <option value='collage'>خاص بالكلية</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal" v-show="(type == 'collage')">
        <div class="field-label is-normal">
            <label class="label required">اختيار الكلية</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="is-fullwidth">
                        <input type="hidden" name="collage_id" :value="collage_id ? collage_id.id : null">
                        <multiselect v-model="collage_id"
                                     :options="collages" :multiple="false"
                                     :close-on-select="true" :clear-on-select="false"
                                     :preserve-search="true" placeholder="يرجي إختيار الكلية"
                                     label="name" track-by="id" :preselect-first="false"
                                     :allow-empty="false" deselect-label="تم الأختيار">
                        </multiselect>
                        <pre  hidden class="language-json"><code>{{ collage_id }}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Multiselect from "vue-multiselect";
export default {
    name: "CollageSelect",
    components: {
        Multiselect
    },
    data() {
        return {
            type: this.oldType ? this.oldType : 'general',
            collage_id: this.oldCollage ? this.oldCollage[0] : '',
            collages: [],
        }
    },
    props : {
        oldType:{
            required: false
        },
        oldCollage:{
            required: false
        }
    },
    created() {
        this.getCollages()
    },
    methods:{
        getCollages: function(){
            axios.get('/dashboard/get_collages')
                .then(function (response) {
                    this.collages = response.data;
                }.bind(this));
        },
        changeType: function() {
            if (this.type == 'general') {
                this.collage_id = null
            }
        },
    }
}
</script>

<style scoped>

</style>
