<x-admin-layout>
    <main style="padding: 20px;">
        <a href="{{ back()->getTargetUrl() }}" class="btn btn-success float-right">Back</a>
        <?php $action = "/admin/people/$person->id" ?>
        <x-form.person-form :action="$action" :method="'PATCH'" :header="'Edit Profile'" :person="$person" :button="'Save'"/>
    </main>
</x-admin-layout>
