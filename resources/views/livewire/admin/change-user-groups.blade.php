<div>
    <select wire:model="group" wire:change="changeGroup"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700
        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500
        dark:focus:border-primary-500">
        <option value="">Selecione uma opção</option>
        <option value="super-admin">Super Admin</option>
        <option value="admin">Admin</option>
        <option value="user">Usuário</option>
    </select>
</div>
