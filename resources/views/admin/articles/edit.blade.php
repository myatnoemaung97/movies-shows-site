<x-admin-layout>
    <main style="padding: 20px;">
        <a href="{{ back()->getTargetUrl() }}" class="btn btn-success float-right">Back</a>
        <x-form.article-form :action="'/admin/articles/' . $article->id" :method="'PATCH'" :header="'Edit Article'" :article="$article" :button="'Save'"/>
    </main>
</x-admin-layout>
