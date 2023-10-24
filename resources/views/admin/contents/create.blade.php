<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/articles/{{ $article->id }}" class="btn btn-success float-right">Back</a>
        <x-form.content-form :action="'/admin/articles/' . $article->id . '/contents'" :method="'POST'" :header="'Create A New Content'" :article="$article" :button="'Create'"/>
    </main>
</x-admin-layout>
