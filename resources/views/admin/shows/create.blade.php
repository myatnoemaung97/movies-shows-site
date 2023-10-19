<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/shows" class="btn btn-success float-right">Back</a>
        <x-form.show-form :action="'/admin/shows'" :method="'POST'" :header="'Create A New Show'" :people="$people" :button="'Create'"/>
    </main>
</x-admin-layout>
