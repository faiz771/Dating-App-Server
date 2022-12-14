@php
$perms = SF::getRolePermissions(auth()->user()->id);
$permissions = $perms['permissions'];
$admin = auth()->user()->id;
@endphp
