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
            <form method="post" action="/warehouse/{{$warehouse->id}}">
                @csrf
                @method('DELETE')
                <a href="warehouse/{{$warehouse->id}}/edit" class= "p-3 font-medium text-blue-600 dark:text-blue-400">Edit</a>
                <a href="warehouse/{{$warehouse->id}}/manage"  class="p-2 text-yellow-600">Manage</a>
                <button type="submit" name="warehouse_id" value="{{$warehouse->id}}" class="text-red-700 hover:text-white pl-1 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
            </form>            
        </td>
    </tr>
</tbody>