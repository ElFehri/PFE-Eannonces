<div>
    <h1>Annonces</h1>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block py-2 sm:px-1 lg:px-8">
            <div class="overflow-hidden">
              <table class="w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-1 py-4">Id</th>
                    <th scope="col" class="px-1 py-4">Title</th>
                    <th  class="px-1 py-4 w-96">Content</th>
                    <th scope="col" class="px-1 py-4">User</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($annonces as $annonce)
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-1 py-4 font-medium">{{ $annonce->id }}</td>
                        <td class="whitespace-nowrap px-1 py-4">{{ $annonce->title }}</td>
                        <td class="whitespace-nowrap px-1 py-4">{{ $annonce->content }}</td>
                        <td class="whitespace-nowrap px-1 py-4">@if ($annonce->user)
                            {{ $annonce->user->name }}
                        @else
                            Unknown
                        @endif</td>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <h1>Informations</h1>
      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-1 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-1 py-4">Id</th>
                    <th scope="col" class="px-1 py-4">Content</th>
                    <th scope="col" class="px-1 py-4">User</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($informations as $information)
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-1 py-4 font-medium">{{ $information->id }}</td>
                        <td class="whitespace-nowrap px-1 py-4">{{ $information->content }}</td>
                        <td class="whitespace-nowrap px-1 py-4">@if ($information->user)
                            {{ $information->user->name }}
                        @else
                            Unknown
                        @endif</td>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>

           
       