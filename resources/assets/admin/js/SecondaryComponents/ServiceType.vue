<template>
<div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">نوع محتوي الخدمة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-fullwidth">
                        <select v-model="type" class="input" name="type" required>
                            <option value="page">محتوي</option>
                            <option value="link">رابط خارجي</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-if="type == 'link'" class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">الرابط الخارجي للخدمة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <input type="text" v-model="link" name="link" required class="input">
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "ServiceType",
    data() {
        return {
            type: this.oldType ? this.oldType : 'page',
            link: this.oldType == 'link' ? this.oldLink : null,
        }
    },
    props: {
        oldType: {
            type: String,
            required: true
        },
        oldLink: {
            type: String,
            required: false
        }
    }
}
</script>

<style scoped>

</style>
