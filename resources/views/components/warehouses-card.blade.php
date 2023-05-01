@props(['warehouse'])

<tbody>
    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$warehouse->name}}
        </th>
        <td class="px-6 py-4">
            {{$warehouse->address}}
        </td>
        <td class="px-6 py-4">
            {{$warehouse->phone}}
        </td>
        <td class="px-6 py-4">
            {{$warehouse->email}}
        </td>
        <td class="px-6 py-4">
            {{$warehouse->status ? 'Active' : 'Inactive'}}
        </td>
        <td class="px-6 py-4 text-center">
            <a href="warehouse/{{$warehouse->id}}/edit" class= "p-3 font-medium text-blue-600 dark:text-blue-400">Edit</a>
            <a href="warehouse/{{$warehouse->id}}/manage"  class="p-2 text-yellow-600">Manage</a>
        </td>
    </tr>
</tbody>