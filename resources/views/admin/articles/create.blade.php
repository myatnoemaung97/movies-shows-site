<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/articles" class="btn btn-success float-right">Back</a>
        <x-form.article-form :action="'/admin/articles'" :method="'POST'" :header="'Create A New Article'" :button="'Save'"/>
    </main>
</x-admin-layout>
