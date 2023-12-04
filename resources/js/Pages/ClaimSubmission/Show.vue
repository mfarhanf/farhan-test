<script setup>
import AuthenticatedLayout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import RedirectButton from '@/Components/RedirectButton.vue';

defineProps({
    submission: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Claim Submission Detail</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <div class="space-y-6">
                            <div>
                                <InputLabel for="name" value="Name" />

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ submission.username }}
                                </p>
                            </div>

                            <div>
                                <InputLabel for="date" value="Date" />

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ submission.date }}
                                </p>
                            </div>

                            <div>
                                <InputLabel for="benefit" value="Benefit" />

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ submission.benefit_name }}
                                </p>
                            </div>

                            <div>
                                <InputLabel for="description" value="Description" />

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ submission.description }}
                                </p>
                            </div>

                            <div>
                                <InputLabel for="amount" value="Amount" />

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ submission.amount }}
                                </p>
                            </div>

                            <div>
                                <InputLabel for="approval_status" value="Approval Status" />

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ submission.approval_status }}
                                </p>
                            </div>

                            <div class="flex items-center gap-4">
                                <RedirectButton :href="route('claim-submission.index')">Back</RedirectButton>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
