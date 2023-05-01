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
            <a href="#" class= "font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            <button type="submit" value="{{$warehouse->id}}" class="p-2 text-rose-600">Delete</button>
        </td>
    </tr>
</tbody>