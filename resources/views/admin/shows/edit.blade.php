<x-admin-layout>
    <main style="padding: 20px;">
        <a href="{{ back()->getTargetUrl() }}" class="btn btn-success float-right">Back</a>
        <?php $action = "/admin/shows/$show->id" ?>
        <x-form.show-form :action="$action" :method="'PATCH'" :header="'Edit Show'" :people="$people" :genres="$genres" :show="$show" :button="'Save'"/>
    </main>
</x-admin-layout>
