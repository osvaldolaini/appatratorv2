@props(['content'])

<div class="drawer lg:drawer-open">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
        <div class="m-3">
            {{ $drawerContent }}
        </div>
    </div>
    <div class="drawer-side">
        <label for="my-drawer-3" class="drawer-overlay"></label>
        @livewire('user.courses.content-side-bar',[$content,$content->id])
    </div>
</div>
