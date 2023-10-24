<x-admin-layout>
    <main style="padding: 20px;">
        <a href="/admin/articles/{{ $article->id }}" class="btn btn-success float-right">Back</a>
        <x-form.content-form :action="'/admin/articles/' . $article->id . '/contents/' . $content->id"  :method="'PATCH'" :header="'Create A New Content'" :article="$article" :content="$content" :button="'Save'"/>
    </main>
</x-admin-layout>
