<template>
    <AppLayout>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div>
                <div class="mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            Edit Request
                        </h3>
                        <p class="mt-1 mb-5 text-sm text-gray-600">
                            Edit Your Request
                        </p>
                    </div>
                    <div
                        class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"
                    >
                        <div>
                            <form
                                @submit.prevent="submit()"
                                enctype="multipart/form-data"
                            >
                                <div class="space-y-12">
                                    <div
                                        class="border-b border-gray-900/10 pb-12"
                                    >
                                        <div
                                            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                                        >
                                            <div class="sm:col-span-full mt-5">
                                                <div
                                                    class="flex justify-between"
                                                >
                                                    <label
                                                        class="block text-sm font-medium leading-6 text-gray-900"
                                                        >Request</label
                                                    >
                                                    <div>
                                                        <a
                                                            target="_blank"
                                                            :href="
                                                                route(
                                                                    'requests.view',
                                                                    {
                                                                        data: form.body,
                                                                    }
                                                                )
                                                            "
                                                            class="rounded-md bg-gray-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                                        >
                                                            Preview
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <div
                                                        class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <ckeditor
                                                            :editor="editor"
                                                            v-model="form.body"
                                                            :config="
                                                                editorConfig
                                                            "
                                                        ></ckeditor>
                                                    </div>
                                                    <div
                                                        v-if="errors.body"
                                                        v-text="errors.body"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="mt-6 flex items-center justify-end gap-x-6"
                                >
                                    <button
                                        @click="returnBack"
                                        type="button"
                                        class="text-sm font-semibold leading-6 text-gray-900"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                        type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    >
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3"; 
import { ClassicEditor } from "@ckeditor/ckeditor5-editor-classic";
import { Alignment } from "@ckeditor/ckeditor5-alignment";
import { Essentials } from "@ckeditor/ckeditor5-essentials";
import { FindAndReplace } from "@ckeditor/ckeditor5-find-and-replace";
import {
    Bold,
    Italic,
    Underline,
    Strikethrough,
    Subscript,
    Superscript,
} from "@ckeditor/ckeditor5-basic-styles";
import { Font } from "@ckeditor/ckeditor5-font";
import { Link as Link1 } from "@ckeditor/ckeditor5-link";
import { Paragraph } from "@ckeditor/ckeditor5-paragraph";
import { Heading } from "@ckeditor/ckeditor5-heading";
import { PasteFromOffice } from "@ckeditor/ckeditor5-paste-from-office";
import { List } from "@ckeditor/ckeditor5-list";
import { Indent, IndentBlock } from "@ckeditor/ckeditor5-indent";
export default {
    props: {
        message: Object,
        errors: Object,
    },
    data() {
        return {
            editor: ClassicEditor,
            editorConfig: {
                // The configuration of the editor.
                plugins: [
                    Essentials,
                    Bold,
                    Italic,
                    Paragraph,
                    Underline,
                    Strikethrough,
                    Subscript,
                    Superscript,
                    Alignment,
                    FindAndReplace,
                    Font,
                    Heading,
                    PasteFromOffice,
                    List,
                    Link1,
                    Indent,
                    IndentBlock,
                ],
                toolbar: {
                    items: [
                        "undo",
                        "redo",
                        "|",
                        "bold",
                        "italic",
                        "underline",
                        "fontSize",
                        "fontFamily",
                        "|",
                        "alignment",
                        "heading",
                        "bulletedList",
                        "numberedList",
                        "indent",
                        "outdent",
                        "link",
                        "findAndReplace",
                        "strikethrough",
                        "subscript",
                        "superscript",
                    ],
                }
            },
            form: useForm({
                body: this.message["body"],
            }),
        };
    },
    components: { AppLayout, Link, SecondaryButton },
    methods: {
        returnBack() {
            router.get("/requests");
        },
        submit() {
            //Validation
            router.put("/requests/" + this.message.id, this.form);
        },
    },
};
</script>
<style>
.ck-editor__editable_inline:not(.ck-comment__input *) {
    height: 15rem;
    overflow-y: auto;
}
</style>
