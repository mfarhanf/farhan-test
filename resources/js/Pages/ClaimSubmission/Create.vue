<script setup>
import AuthenticatedLayout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import RedirectButton from '@/Components/RedirectButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectDropdown from '@/Components/SelectDropdown.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';

const user = usePage().props.auth.user;

const form = useForm({
    name: '',
    date: '',
    benefit: '',
    description: '',
    amount: '',
});

defineProps({
    benefits: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <Head title="Create" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Claim Submission</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section class="max-w-xl">
                        <form @submit.prevent="form.post(route('claim-submission.store'))" class="space-y-6">
                            <div>
                                <InputLabel for="name" value="Name" />

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="Name"
                                />

                                <InputError class="mt-2" :message="form.errors.username" />
                            </div>

                            <div>
                                <InputLabel for="date" value="Date" />

                                <Datepicker v-model="form.date" :enable-time-picker="false" required />

                                <InputError class="mt-2" :message="form.errors.date" />
                            </div>

                            <div>
                                <InputLabel for="benefit" value="Benefit" />

                                <SelectDropdown
                                    :options="benefits"
                                    :default="'Please select'"
                                    class="select"
                                    v-model="form.benefit"
                                />

                                <InputError class="mt-2" :message="form.errors.benefit" />
                            </div>

                            <div>
                                <InputLabel for="description" value="Description" />

                                <TextInput
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    required
                                    autofocus
                                    autocomplete="Description"
                                />

                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>

                            <div>
                                <InputLabel for="amount" value="Amount" />

                                <TextInput
                                    id="amount"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.amount"
                                    required
                                    autofocus
                                    autocomplete="Amount"
                                />

                                <InputError class="mt-2" :message="form.errors.amount" />
                            </div>

                            <div class="flex items-center gap-4">
                                <RedirectButton :href="route('claim-submission.index')">Cancel</RedirectButton>
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
