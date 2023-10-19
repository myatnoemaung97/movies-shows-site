<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/people" class="btn btn-success float-right">Back</a>
        <x-form.person-form :action="'/admin/people'" :method="'POST'" :header="'Create A New Profile'" :button="'Create'"/>
    </main>
</x-admin-layout>
