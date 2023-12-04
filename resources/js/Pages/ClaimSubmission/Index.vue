<script setup>
import AuthenticatedLayout from '@/Layouts/Layout.vue';
import NavLink from '@/Components/NavLink.vue';
import RedirectButton from '@/Components/RedirectButton.vue';
import { Head } from '@inertiajs/vue3';
import { VueTable  } from "@harv46/vue-table"
import "@harv46/vue-table/dist/style.css"

const header = ["Name", "Date", "Benefit", "Description", "Amount", "Approval Status"]
const keys = ["username", "date", "benefit_name", "description", "amount", "approval_status"]

defineProps({
    submissions: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <Head title="Index" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Claim Submission List</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <header>
                            <RedirectButton :href="route('claim-submission.create')">Create</RedirectButton>
                        </header>

                        <br />

                        <VueTable :headers="header" :data="submissions" :keys="keys">
                            <template #th>
                                <th> Actions</th>
                            </template>
                            <template #td="{ item }">
                                <td>
                                    <NavLink :href="route('claim-submission.show', item.id)">View</NavLink>
                                </td>
                            </template>
                        </VueTable>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
