<template>
    <div class="detailBox">
        <div class="titleBox">
            <label>Remarks</label>
        </div>
        <div class="actionBox">
            <ul class="commentList p-6">
                <slot />
            </ul>
            <div class="text-center">
                <form @submit.prevent="submit" class="form-inline" role="form">
                    <div class="form-group">
                        <input
                            v-model="form.remark"
                            class="form-control"
                            type="text"
                            placeholder="Add a remark..."
                        />
                    </div>
                    <div class="form-group ml-2">
                        <button
                            :class="{
                                'opacity-25': form.processing,
                            }"
                            :disabled="form.processing"
                            class="btn btn-default"
                        >
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import { router, useForm } from "@inertiajs/vue3";

export default {
    props: { thread: Number },
    data() {
        return {
            form: useForm({
                remark: "",
                threadId: this.thread,
            }),
        };
    },
    methods: {
        submit() { 
            this.$emit('post', this.form);
        },
    },
};
</script>
<style scoped>
/* @import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css); */
.detailBox {
    border: 1px solid #e7e7e7;
    margin: 50px;
}
.titleBox {
    background-color: #fdfdfd;
    padding: 10px;
}
.titleBox label {
    color: #444;
    margin: 0;
    display: inline-block;
}

.actionBox .form-group * {
    width: 100%;
}
.commentList {
    list-style: none;
}

.actionBox {
    border-top: 1px dotted #bbb;
    padding: 10px;
}

.form-group {
    margin-bottom: 15px;
}

.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s,
        box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}

label {
    font-weight: 700;
}

.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}

@media (min-width: 768px) {
    .form-inline .form-group {
        display: inline-block;
        margin-bottom: 0;
        vertical-align: middle;
    }

    .form-inline .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
    }
}
</style>
