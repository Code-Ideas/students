<template>
    <div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">اختيار الكلية </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="collage_id" class='form-control' v-model='collage_id' @change='changeCollage()'>
                                <option disabled value='0' >يرجي اختيار الكلية </option>
                                <option v-for='data in collages' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-horizontal" v-show="(collages.length > 0 && years.length > 0)">
            <div class="field-label is-normal">
                <label class="label required">اختيار الفرقة الدراسية </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="year_id" class='form-control' v-model='year_id' @change='changeYear()'>
                                <option disabled value='0' >يرجي اختيار الفرقة الدراسية </option>
                                <option v-for='data in years' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal" v-show="(collages.length > 0 && departments.length > 0)">
            <div class="field-label is-normal">
                <label class="label required">اختيار القسم </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="department_id" class='form-control' v-model='department_id' @change='changeDepartment()'>
                                <option disabled value='0' >يرجي اختيار القسم </option>
                                <option v-for='data in departments' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal" v-show="(departments.length > 0 && students.length > 0)">
            <div class="field-label is-normal">
                <label class="label required">يرجي اختيار الطالب</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="student_id" class='form-control' v-model='student_id'>
                                <option disabled value='0' >يرجي اختيار الطالب</option>
                                <option v-for='data in students' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StudentSelect",
    data() {
        return {
            collage_id: this.oldCollage ? this.oldCollage : 0,
            collages: [],
            department_id: this.oldDepartment ? this.oldDepartment : 0,
            departments: [],
            year_id: this.oldYear ? this.oldYear : 0,
            years: [],
            student_id: this.oldStudent ? this.oldStudent : 0,
            students: [],
        }
    },
    props : {
        oldCollage:{
            required: false
        },
        oldDepartment:{
            required: false
        },
        oldYear:{
            required: false
        },
        oldStudent:{
            required: false
        },
    },
    methods:{
        getCollages: function(){
            axios.get('/dashboard/get_collages')
                .then(function (response) {
                    this.collages = response.data;
                }.bind(this));
        },
        getYears: function() {
            axios.get('/dashboard/get_years/'+this.collage_id).then(function(response){
                this.years = response.data;
                this.students = [];
            }.bind(this));
        },
        getDepartments: function() {
            axios.get('/dashboard/get_departments/'+this.collage_id).then(function(response){
                this.departments = response.data;
                this.students = [];
            }.bind(this));
        },
        getStudents: function() {
            axios.get('/dashboard/get_students/'+this.department_id+'/'+this.year_id).then(function(response){
                this.students = response.data;
            }.bind(this));
        },
        changeCollage: function() {
            this.department_id = 0;
            this.student_id = 0;
            this.year_id = 0;
            this.getYears();
            this.getDepartments();
        },
        changeDepartment: function() {
            this.student_id = 0;
            this.getStudents();
        },
        changeYear: function() {
            this.department_id = 0;
        },
    },
    created: function(){
        this.getCollages()
        if (this.oldDepartment) {
            this.getDepartments()
        }
        if (this.oldYear) {
            this.getYears()
        }
        if (this.oldStudent) {
            this.getStudents()
        }
    }
}
</script>

<style scoped>

</style>
