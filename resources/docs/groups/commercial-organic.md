# Commercial Organic

Commercial organic requests

## Add commercial organic

<small class="badge badge-darkred">requires authentication</small>

Adds a new commercial organic item to database

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/commercial_organic" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"name":"delectus","pcpb_number":{},"manufacturer":{},"distributor":{},"category":{},"contact_details":{},"image":{},"external_links":{},"application_details":{},"pests_diseases_weeds":{}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "name": "delectus",
    "pcpb_number": {},
    "manufacturer": {},
    "distributor": {},
    "category": {},
    "contact_details": {},
    "image": {},
    "external_links": {},
    "application_details": {},
    "pests_diseases_weeds": {}
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic'
payload = {
    "name": "delectus",
    "pcpb_number": {},
    "manufacturer": {},
    "distributor": {},
    "category": {},
    "contact_details": {},
    "image": {},
    "external_links": {},
    "application_details": {},
    "pests_diseases_weeds": {}
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/commercial_organic',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'delectus',
            'pcpb_number' => [],
            'manufacturer' => [],
            'distributor' => [],
            'category' => [],
            'contact_details' => [],
            'image' => [],
            'external_links' => [],
            'application_details' => [],
            'pests_diseases_weeds' => [],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

status = 201
{
     "code": 201,
     "message": "Saved",
     "success": true,
     "data": {
         "id": 95,
         "name": "Lorem ipsum",
         "pcpb_number": null,
         "manufacturer": null,
         "distributor": null,
         "category": null,
         "contact_details": null,
         "external_links": null,
         "application_details": null,
         "image": null
     }
}
```
> Example response (501, Active ingredient not created):

```json
{
    "code": 501,
    "message": "Not Created",
    "success": false
}
```
<div id="execution-results-POSTapi-commercial_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-commercial_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-commercial_organic"></code></pre>
</div>
<div id="execution-error-POSTapi-commercial_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-commercial_organic"></code></pre>
</div>
<form id="form-POSTapi-commercial_organic" data-method="POST" data-path="api/commercial_organic" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-commercial_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/commercial_organic</code></b>
</p>
<p>
<label id="auth-POSTapi-commercial_organic" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-commercial_organic" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-commercial_organic" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="POSTapi-commercial_organic" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>manufacturer</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="manufacturer" data-endpoint="POSTapi-commercial_organic" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>distributor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributor" data-endpoint="POSTapi-commercial_organic" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category" data-endpoint="POSTapi-commercial_organic" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>contact_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="contact_details" data-endpoint="POSTapi-commercial_organic" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="POSTapi-commercial_organic" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>external_links</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="external_links" data-endpoint="POSTapi-commercial_organic" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>application_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="application_details" data-endpoint="POSTapi-commercial_organic" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pests_diseases_weeds</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pests_diseases_weeds" data-endpoint="POSTapi-commercial_organic" data-component="body"  hidden>
<br>

</p>

</form>


## Update commercial organic

<small class="badge badge-darkred">requires authentication</small>

Updates the commercial organic item based on the ID

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/commercial_organic/aut" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"name":"voluptate","pcpb_number":{},"manufacturer":{},"distributor":{},"category":{},"contact_details":{},"image":{},"external_links":{},"application_details":{},"pests_diseases_weeds":{}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/aut"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "name": "voluptate",
    "pcpb_number": {},
    "manufacturer": {},
    "distributor": {},
    "category": {},
    "contact_details": {},
    "image": {},
    "external_links": {},
    "application_details": {},
    "pests_diseases_weeds": {}
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/aut'
payload = {
    "name": "voluptate",
    "pcpb_number": {},
    "manufacturer": {},
    "distributor": {},
    "category": {},
    "contact_details": {},
    "image": {},
    "external_links": {},
    "application_details": {},
    "pests_diseases_weeds": {}
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/commercial_organic/aut',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'voluptate',
            'pcpb_number' => [],
            'manufacturer' => [],
            'distributor' => [],
            'category' => [],
            'contact_details' => [],
            'image' => [],
            'external_links' => [],
            'application_details' => [],
            'pests_diseases_weeds' => [],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (201):

```json
{
    "code": 201,
    "message": "Updated",
    "success": true,
    "data": {
        "id": 95,
        "name": "Lorem Ipsum",
        "pcpb_number": "PCPB(CR)3999",
        "manufacturer": "Aenean facilisis",
        "distributor": null,
        "category": null,
        "contact_details": null,
        "external_links": null,
        "application_details": null,
        "image": null,
        "pests_diseases_weed": [],
        "control_methods": []
    }
}
```
> Example response (501, Update failed):

```json
{
    "code": 501,
    "message": "Update Unsuccessful",
    "success": false
}
```
<div id="execution-results-PUTapi-commercial_organic--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-commercial_organic--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-commercial_organic--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-commercial_organic--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-commercial_organic--id-"></code></pre>
</div>
<form id="form-PUTapi-commercial_organic--id-" data-method="PUT" data-path="api/commercial_organic/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-commercial_organic--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/commercial_organic/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-commercial_organic--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-commercial_organic--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-commercial_organic--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-commercial_organic--id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="PUTapi-commercial_organic--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>manufacturer</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="manufacturer" data-endpoint="PUTapi-commercial_organic--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>distributor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributor" data-endpoint="PUTapi-commercial_organic--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category" data-endpoint="PUTapi-commercial_organic--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>contact_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="contact_details" data-endpoint="PUTapi-commercial_organic--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="PUTapi-commercial_organic--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>external_links</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="external_links" data-endpoint="PUTapi-commercial_organic--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>application_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="application_details" data-endpoint="PUTapi-commercial_organic--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pests_diseases_weeds</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pests_diseases_weeds" data-endpoint="PUTapi-commercial_organic--id-" data-component="body"  hidden>
<br>

</p>

</form>


## Delete commercial organic

<small class="badge badge-darkred">requires authentication</small>

Deletes a commercial organic item based on the id value

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/commercial_organic/molestiae" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/molestiae"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/molestiae'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/commercial_organic/molestiae',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 200,
    "message": "Deleted",
    "success": true,
    "data": null
}
```
> Example response (501, Delete failed):

```json
{
    "code": 501,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-DELETEapi-commercial_organic--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-commercial_organic--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-commercial_organic--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-commercial_organic--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-commercial_organic--id-"></code></pre>
</div>
<form id="form-DELETEapi-commercial_organic--id-" data-method="DELETE" data-path="api/commercial_organic/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-commercial_organic--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/commercial_organic/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-commercial_organic--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-commercial_organic--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-commercial_organic--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Get all commercial organic items


Retrieve all commercial organic items

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic?order_column=tenetur&order_direction=recusandae&per_page=nemo" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic"
);

let params = {
    "order_column": "tenetur",
    "order_direction": "recusandae",
    "per_page": "nemo",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic'
params = {
  'order_column': 'tenetur',
  'order_direction': 'recusandae',
  'per_page': 'nemo',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'order_column'=> 'tenetur',
            'order_direction'=> 'recusandae',
            'per_page'=> 'nemo',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
     "data": [
         {
             "id": 422,
             "name": "Vivamus",
             "pcpb_number": "PCPB(CR)3999",
             "manufacturer": "Donec suscipit",
             "distributor": "Donec suscipit",
             "category": "Biocontrol",
             "contact_details": "<p>P.O.Box 23423423</p><p>Nairobi 2234234 Kenya</p><p>Cell: +254 234 564 122</p>",
             "external_links": [
                 "<p>www.suscipit.com</p>",
                 "<p>https://www.suscipit.com/shop/Vivamus/</p>"
             ],
             "application_details": [],
             "image": "1a240c03cc1b7a16a16291da123133ed8.jpg",
             "pests_diseases_weed": [
                 {
                     "id": 9,
                     "name": "Cras",
                     "type": "Pest",
                     "scientific_name": "Nullam feugiat",
                     "description_pest": "Cras quis nunc scelerisque velit porttitor porttitor non eget ipsum. Nam non tincidunt ligula. Suspendisse potenti. Ut ut maximus elit. Phasellus tempor quis eros a vulputate. Proin euismod ligula augue, tempor viverra libero commodo a. Suspendisse placerat massa id facilisis dapibus.",
                     "description_impact": "Cras quis nunc scelerisque velit porttitor porttitor non eget ipsum. Nam non tincidunt ligula. Suspendisse potenti. Ut ut maximus elit. Phasellus tempor quis eros a vulputate. Proin euismod ligula augue, tempor viverra libero commodo a. Suspendisse placerat massa id facilisis dapibus.",
                     "image": "ba2e5bf4660c05b43fef23453ab25c8.jpeg",
                     "references": "https://www.gravida.org/cras."
                 },
                 .
                 .
                 .
             ],
             "control_methods": [
                 {
                     "id": 2,
                     "name": "Biopesticide Control Method for Cras",
                     "category": "Biopesticide",
                     "options": [
                         "Nullam feugiat arcu dolor, eget vulputate nibh",
                         "Duis eget gravida lorem, a auctor mi.",
                     ],
                     "external_links": [],
                     "image": "c5007a207c511232324c96a993a700c.jpg"
                 },
                 .
                 .
                 .
             ]
         },
         .
         .
         .
     ],
     "links": {
         "first": "https://api.safeinputs.koan.co.ke/api/commercial_organic?page=1",
         "last": "https://api.safeinputs.koan.co.ke/api/commercial_organic?page=6",
         "prev": null,
         "next": "https://api.safeinputs.koan.co.ke/api/commercial_organic?page=2"
     },
     "meta": {
         "current_page": 1,
         "from": 1,
         "last_page": 6,
         "path": "https://api.safeinputs.koan.co.ke/api/commercial_organic",
         "per_page": "16",
         "to": 16,
         "total": 83
     }
}
```
> Example response (404, Items not found):

```json
{
    "code": 404,
    "message": "Items not found",
    "success": false
}
```
<div id="execution-results-GETapi-commercial_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic"></code></pre>
</div>
<form id="form-GETapi-commercial_organic" data-method="GET" data-path="api/commercial_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="per_page" data-endpoint="GETapi-commercial_organic" data-component="query"  hidden>
<br>

</p>
</form>


## Search commercial organic


Performs search on commercial organic records based on query parameter values<br>
Query parameter keys are the columns

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/filter/id?per_page=1&order_direction=desc&order_column=id&pcpb_number=ipsa&manufacturer=ea&distributor=deserunt&category=non&contact_details=quia&external_links=sint&application_details=quisquam" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/filter/id"
);

let params = {
    "per_page": "1",
    "order_direction": "desc",
    "order_column": "id",
    "pcpb_number": "ipsa",
    "manufacturer": "ea",
    "distributor": "deserunt",
    "category": "non",
    "contact_details": "quia",
    "external_links": "sint",
    "application_details": "quisquam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/filter/id'
params = {
  'per_page': '1',
  'order_direction': 'desc',
  'order_column': 'id',
  'pcpb_number': 'ipsa',
  'manufacturer': 'ea',
  'distributor': 'deserunt',
  'category': 'non',
  'contact_details': 'quia',
  'external_links': 'sint',
  'application_details': 'quisquam',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/filter/id',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'per_page'=> '1',
            'order_direction'=> 'desc',
            'order_column'=> 'id',
            'pcpb_number'=> 'ipsa',
            'manufacturer'=> 'ea',
            'distributor'=> 'deserunt',
            'category'=> 'non',
            'contact_details'=> 'quia',
            'external_links'=> 'sint',
            'application_details'=> 'quisquam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
     "data": [
         {
             "id": 911,
             "name": "Sed viverra",
             "pcpb_number": "PCPB(CR)9999",
             "manufacturer": "Vivamus diam ligula",
             "distributor": "Vivamus diam ligula",
             "category": "Biocontrol",
             "contact_details": "<h3>Vivamus diam ligulah3><p>House , 5th Floor</p></p>",
             "external_links": [
                 "<p><a href=\"http://www.vivamusdiamligula.com/sed_viverra/\">http://www.vivamusdiamligula.com/sed_viverra/</a></p>"
             ],
             "application_details": [
                 "<p>Quisque eu nunc volutpat, sodales arcu quis, varius metus. Nulla vitae laoreet felis. Duis finibus faucibus eros, at gravida enim porta ut</p>"
             ],
             "image": "d4bb5367896cc5ce4d39d20e2a1859e4a.jpg",
             "pests_diseases_weed": [
                 {
                     "id": 282,
                     "name": "Duis eget",
                     "type": "Pest",
                     "scientific_name": "Vestibulum luctus",
                     "description_pest": "Vivamus diam ligula, finibus id risus vel, vestibulum bibendum enim",
                     "description_impact": "Nullam sit amet magna massa. Quisque cursus tempor nunc",
                     "image": "ee24145d7ba03b23458bf8cab608b447.png",
                     "references": "https://www.accumsan.org/duiseget"
                 }
             ],
             "control_methods": [
                 {
                     "id": 5,
                     "name": "Biopesticide Control Methods for Duis eget",
                     "category": "Biopesticide",
                     "options": [
                         "Etiam gravida dapibus felis.",
                         "Etiam gravida dapibus felis."
                     ],
                     "external_links": [
                         "Vestibulum luctus rutrum elit. Fusce fringilla"
                     ],
                     "image": "87dd00a40e9b9d95b00212382dec361a.jpg"
                 }
             ]
         },
     ],
     "links": {
         "first": "https://api.safeinputs.koan.co.ke/api/commercial_organic/filter/op?page=1",
         "last": "https://api.safeinputs.koan.co.ke/api/commercial_organic/filter/op?page=3",
         "prev": null,
         "next": "https://api.safeinputs.koan.co.ke/api/commercial_organic/filter/op?page=2"
     },
     "meta": {
         "current_page": 1,
         "from": 1,
         "last_page": 3,
         "path": "https://api.safeinputs.koan.co.ke/api/commercial_organic/filter/op",
         "per_page": "16",
         "to": 16,
         "total": 39
     }
}
```
> Example response (404, Items not found):

```json
{
    "code": 404,
    "message": "Items not found",
    "success": false
}
```
<div id="execution-results-GETapi-commercial_organic-filter--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic-filter--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic-filter--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic-filter--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic-filter--search_value--"></code></pre>
</div>
<form id="form-GETapi-commercial_organic-filter--search_value--" data-method="GET" data-path="api/commercial_organic/filter/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic-filter--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/filter/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>
asc | desc
</p>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>
*use query parameter names below*
</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>manufacturer</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="manufacturer" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributor" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>contact_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="contact_details" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>external_links</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="external_links" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>application_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="application_details" data-endpoint="GETapi-commercial_organic-filter--search_value--" data-component="query"  hidden>
<br>

</p>
</form>


## Implementation for Datatables API to populate table with commercial organic records




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/datatable" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/datatable"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/datatable'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/datatable',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 94,
            "name": "GC-3EC",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": null,
            "application_details": null,
            "image": "da60f660ab7e3685ec6b99903f1445f9.jpg"
        },
        {
            "id": 93,
            "name": "Funguran 50",
            "pcpb_number": "REG NO:PCPB(CR)0656",
            "manufacturer": "AMIRAN (K) LIMITED",
            "distributor": "AMIRAN (K) LIMITED",
            "category": "Biocontrol",
            "contact_details": "<p>Old Airport North Road, Nairobi, Kenya<\/p><p>pr@amirankenya.com<\/p><p>+254 719 095000,<\/p><p>0800720720<\/p>",
            "external_links": [
                "<p><a href=\"https:\/\/www.baltoncp.com\/amirankenya\/agribusiness\/chemicals\/\">https:\/\/www.baltoncp.com\/amirankenya\/agribusiness\/chemicals\/<\/a><\/p>"
            ],
            "application_details": [],
            "image": "be37e99cde036295a7bdb2e70562d523.jpg"
        },
        {
            "id": 91,
            "name": "Delfin (Bacillus Thuringiensis)",
            "pcpb_number": null,
            "manufacturer": "Arysta LifeScience (K) Ltd",
            "distributor": "Arysta LifeScience (K) Ltd",
            "category": "Biocontrol",
            "contact_details": "<h3>Arysta LifeScience (K) Ltd ,<\/h3><p>Tulip House , 5th Floor Mombasa Road .<\/p><p>P.O Box 30335,00100<\/p><p>Nairobi , Kenya<\/p><p>Tel: +254717432174<\/p><p><a href=\"mailto:arysta.kenya@arysta.com\">arysta.kenya@arysta.com<\/a><\/p>",
            "external_links": [
                "<p><a href=\"http:\/\/www.arystalifescience.co.ke\/product_categories\/insecticides\/?product_id=1755\">http:\/\/www.arystalifescience.co.ke\/product_categories\/insecticides\/?product_id=1755<\/a><\/p>"
            ],
            "application_details": [
                "<p><strong>Directions for use:<\/strong> Apply as soons as early instar larvae are noticed<\/p><p><strong>Dosage:<\/strong> 0.25 kgs for Cabbage and 0.5kgs for Coffee (5-10g in 20 litres of water )<\/p>"
            ],
            "image": "d4bb5228f6cc5ce4d39d20e2a1859e4a.jpg"
        },
        {
            "id": 90,
            "name": "Curenox",
            "pcpb_number": null,
            "manufacturer": "Twiga Chemicals",
            "distributor": "Twiga Chemicals",
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": [
                "<p><a href=\"https:\/\/www.twigachemicals.com\/wp-content\/uploads\/2017\/05\/curanox-label.pdf\">https:\/\/www.twigachemicals.com\/wp-content\/uploads\/2017\/05\/curanox-label.pdf<\/a><\/p>"
            ],
            "application_details": [
                "<p><strong>CURENOX 50 WP GENERAL INFORMATION<\/strong><\/p><p>A broad spectrum green copper based wettable powder fungicide for the preventative<\/p><p>control of early and late blight in tomato, coffee leaf rust and coffee berry disease in<\/p><p>coffee.<\/p><p><strong>Mode of action<\/strong><\/p><p>Copper ions are absorbed by fungal and bacterial spores as they grow. Once<\/p><p>absorbed, copper disrupts the enzyme systems of the pathogenic organisms. It is a<\/p><p>protectant fungicide therefore it must be deposited on the crop before the fungal<\/p><p>spores begin to germinate.&nbsp;<\/p><p>&nbsp;<\/p><p><strong>Re-Entry&nbsp;Period&nbsp;:&nbsp;<\/strong>12hrs&nbsp;or&nbsp;after&nbsp;spray&nbsp;has&nbsp;dried&nbsp;on&nbsp;the&nbsp;leaves<\/p><p><strong>Note:&nbsp;<\/strong>Apply&nbsp;prior&nbsp;to&nbsp;disease&nbsp;appearance&nbsp;and&nbsp;follow&nbsp;recommended &nbsp;spray&nbsp;intervals.<\/p><p>&nbsp;<\/p><p><strong>Preparation&nbsp;of&nbsp;the&nbsp;spray<\/strong><\/p><p>Mixthe&nbsp;required&nbsp; quantity&nbsp;of&nbsp;<strong>CURENOX &nbsp;50WP&nbsp; &nbsp;<\/strong>in&nbsp;one&nbsp;third&nbsp;(1\/3)&nbsp;of&nbsp;the&nbsp;necessary&nbsp;amount &nbsp;of&nbsp;water &nbsp;while&nbsp; constantly &nbsp;agitating. &nbsp;Mix&nbsp;into&nbsp;a&nbsp;slurry &nbsp;and&nbsp;top&nbsp;up&nbsp;with&nbsp;the&nbsp;remainingamount&nbsp;of water,&nbsp;while&nbsp;constantly&nbsp;agitating.&nbsp;Even&nbsp;while&nbsp;spraying&nbsp;constant&nbsp;agitation&nbsp;is&nbsp;necessary.&nbsp; Spray&nbsp;to&nbsp;give&nbsp;an&nbsp;even&nbsp;coverage.Use&nbsp;the&nbsp;spray&nbsp;on&nbsp;the&nbsp;same&nbsp;day&nbsp;of&nbsp;its&nbsp;preparation.<\/p><p>&nbsp;<\/p><p><strong>HAZARDS&nbsp;\/PRECAUTIONS<\/strong><\/p><p>Thisproduct&nbsp;is&nbsp;harmful&nbsp;if inhaled&nbsp;or&nbsp;swallowed.<\/p><p><strong>Handling: &nbsp;<\/strong>Wearprotective &nbsp;clothing &nbsp;namely; &nbsp;overalls, &nbsp;gloves,&nbsp; gum&nbsp;boots,hat\/head&nbsp;dress&nbsp;or dust&nbsp;mask&nbsp;when&nbsp;preparing&nbsp;the&nbsp;spray&nbsp;mixture&nbsp;and&nbsp;face&nbsp;shield&nbsp;while&nbsp;spraying.&nbsp;Avoid&nbsp;breathing &nbsp;in&nbsp;dust.&nbsp;Avoid&nbsp; contact &nbsp;with&nbsp;skin,&nbsp;eyes&nbsp;and&nbsp;clothing. &nbsp;Do&nbsp;not&nbsp;apply&nbsp;upwind&nbsp;and&nbsp;stay&nbsp;out&nbsp;of the&nbsp;spray&nbsp;mist.&nbsp;Do&nbsp;not&nbsp;smoke,&nbsp;drink&nbsp;or eatwhile&nbsp;handling&nbsp;the product.<\/p><p><strong>After&nbsp;work:&nbsp;<\/strong>Change&nbsp;clothes&nbsp;and thoroughly&nbsp;wash&nbsp;hands&nbsp;and face.&nbsp;Carefully&nbsp;wash&nbsp;the&nbsp;spraying&nbsp;equipment&nbsp;and&nbsp;working&nbsp;clothes.<\/p><p><strong>STORAGE:&nbsp;<\/strong>Curenox&nbsp;50WP&nbsp;must&nbsp;be kept&nbsp;in&nbsp;its original,&nbsp;sealed&nbsp;containerin&nbsp;a&nbsp;cool,&nbsp;dry&nbsp;and&nbsp;well&nbsp;ventilated&nbsp;place&nbsp;under&nbsp;lock&nbsp;and&nbsp;key away&nbsp;from&nbsp;food&nbsp;stuffs,&nbsp;beverages,&nbsp;animal&nbsp;feed&nbsp;and&nbsp;packaging &nbsp;materials &nbsp;used&nbsp; for&nbsp;these &nbsp;commodities. &nbsp;Store &nbsp;out&nbsp;of&nbsp;reach &nbsp;of&nbsp;childrenand&nbsp;unauthorized&nbsp;people.<\/p><p><strong>DISPOSAL:&nbsp; <\/strong>Surplus&nbsp;product,&nbsp;if&nbsp;unused&nbsp;should&nbsp;be&nbsp;disposed&nbsp;off&nbsp;accordingto&nbsp;national&nbsp;regulations &nbsp;on&nbsp;chemicaldisposal&nbsp;on&nbsp;a&nbsp;landfillsite&nbsp;approved&nbsp; for&nbsp;pesticides &nbsp;in&nbsp;a&nbsp;safe&nbsp;place&nbsp;away&nbsp;from&nbsp;water&nbsp;sources. &nbsp;Do&nbsp;not&nbsp;use&nbsp;empty&nbsp;containerfor any&nbsp;other&nbsp;purpose.&nbsp;Empty&nbsp;containers&nbsp;are&nbsp;to&nbsp;be&nbsp;triple&nbsp;rinsed,&nbsp;flattened,&nbsp;perforated&nbsp;and&nbsp;disposed&nbsp;off&nbsp;on&nbsp;a&nbsp;landfill &nbsp;site&nbsp;in&nbsp;a&nbsp;safe&nbsp;place&nbsp; away&nbsp; from&nbsp;water &nbsp;sources &nbsp;in&nbsp;accordance &nbsp;with&nbsp;national&nbsp;regulations&nbsp;on&nbsp;chemical&nbsp;disposal.<\/p><p>&nbsp;<\/p><p><strong>ENVIRONMENT<\/strong><\/p><p><strong>CURENOX &nbsp;50WP&nbsp;<\/strong>is&nbsp;very&nbsp;toxic&nbsp;to&nbsp;aquatic&nbsp;life.&nbsp;It&nbsp;is&nbsp;hazardous &nbsp;to&nbsp;domestic&nbsp;animals.&nbsp;Livestockshould&nbsp;not&nbsp;be&nbsp;allowed&nbsp;to&nbsp;feed&nbsp;on&nbsp;newly&nbsp;sprayed&nbsp;herbage.&nbsp;Do&nbsp;not&nbsp;contami-&nbsp;nate&nbsp;ponds&nbsp;or&nbsp;waterways &nbsp;by&nbsp;direct&nbsp;application, &nbsp;cleaning&nbsp; of&nbsp;equipment, &nbsp;disposal&nbsp; of&nbsp;waste&nbsp;and&nbsp;empty&nbsp;paper&nbsp;pack.<\/p>"
            ],
            "image": "cdb2832eaa2a09fc0827943758f9f81b.png"
        },
        {
            "id": 89,
            "name": "Cuprocaffaro",
            "pcpb_number": null,
            "manufacturer": "Arysta LifeScience (K) Ltd",
            "distributor": "Arysta LifeScience (K) Ltd",
            "category": "Biocontrol",
            "contact_details": "<h3>Arysta LifeScience (K) Ltd ,<\/h3><p>Tulip House , 5th Floor Mombasa Road .<\/p><p>P.O Box 30335,00100<\/p><p>Nairobi , Kenya<\/p><p>Tel: +254717432174<\/p><p><a href=\"mailto:arysta.kenya@arysta.com\">arysta.kenya@arysta.com<\/a><\/p>",
            "external_links": [],
            "application_details": [
                "<p><strong>Composition:<\/strong> 37.5% W\/W Copper Oxychloride (Metallic copper)<\/p><p><strong>Formulation:<\/strong> Wettable dispersible Granule (WG)<\/p><p><strong>Crop:<\/strong> Coffee, Potatoes, Tomatoes &amp; French Beans<\/p><p><strong>Spectrum:<\/strong> Coffee Leaf Rust, Coffee Berry Disease, Early &amp; late blight<\/p><p><strong>Hazard classification:<\/strong> Class III (slightly hazardous)<\/p><p><strong>Packaging:<\/strong> 500 g, 1 kg &amp; 2 kg<\/p><p>&nbsp;<\/p><figure class=\"table\"><table><thead><tr><th><strong>Crop<\/strong><\/th><th><strong>Disease<\/strong><\/th><th><strong>Dosage<\/strong><\/th><th><strong>Knapsack rate Spray interval<\/strong><\/th><th><strong>Pre-harvest&nbsp;<\/strong><br><strong>Interval (PHI)<\/strong><\/th><\/tr><\/thead><tbody><tr><td rowspan=\"2\"><p><strong>&nbsp;<\/strong><\/p><p>&nbsp;<\/p><p><strong>Coffee<\/strong><\/p><\/td><td>Coffee Leaf<br>Rust<\/td><td>3.8 kg\/ha in 1100 L of water<\/td><td>70 g\/ 20 L Knapsack<br>50 g\/5 L Knapsack<br>Spray at 3 weeks interval.<\/td><td><p>&nbsp;<\/p><p>&nbsp;<\/p><p>14 days<\/p><\/td><\/tr><tr><td>Coffee Berry<br>Disease<\/td><td>7.0 kg\/ha in 1000 L of water<\/td><td>130 g\/20 L Knapsack<br>100 g\/15 L Knapsack<br>Spray at 4 weeks interval.<\/td><td><p>&nbsp;<\/p><p>&nbsp;<\/p><p>14 days<\/p><\/td><\/tr><tr><td><strong>Potatoes<\/strong><\/td><td>Late blight<\/td><td rowspan=\"3\">2.7 kg\/ha in 1000 L of water<\/td><td rowspan=\"3\">54g\/20 L Knapsack. 40g\/15 L Knapsack<br>Spray at 7-10 days<br>interval when plants are six inches high until<br>harvest.<\/td><td>3 days<\/td><\/tr><tr><td><strong>Tomatoes<\/strong><\/td><td>Early &amp; late blight<\/td><td>3 days<\/td><\/tr><tr><td><strong>French<\/strong><br><strong>Beans<\/strong><\/td><td>Anthracnose,<br>Sclerotinia,<br>Angular leaf spot, Rust<\/td><td>3 days<\/td><\/tr><\/tbody><\/table><\/figure>"
            ],
            "image": "c4437f62d4269ac064ecaa7c1ad7d984.png"
        },
        {
            "id": 88,
            "name": "Cupravit",
            "pcpb_number": "PCPB(CR)0 383",
            "manufacturer": "piess Urania Chemicals, Germany \/ Bayer Crop Science, Germany Distributor: Coffee Management Services Ltd.",
            "distributor": "Kijani Agencies Ltd.",
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": [],
            "application_details": [],
            "image": "495a809d77f15a508925c266e38fcf5d.png"
        },
        {
            "id": 87,
            "name": "Cobox 50",
            "pcpb_number": "PCPB(CR)0025",
            "manufacturer": "Spiess Urania, Germany.",
            "distributor": "Kijani Agencies Ltd",
            "category": "Biocontrol",
            "contact_details": "<p>Kijani Agencies Ltd., P.O. Box 13980, 00800 Nairobi.<\/p>",
            "external_links": [],
            "application_details": [
                "<p>A preventive fungicide for control of Coffee Berry Disease (CBD) and Coffee leaf Rust in<\/p><p>coffee. It’s the finest green copper used in coffee industry with an optimum particle size<\/p><p>which ensures good coverage and uptake of copper ions by the fungus causing CBD and Leaf<\/p><p>rust. Packs 25kg, 2kg and 1kg.<\/p><p><strong>Fact Sheet:<\/strong><\/p><p>Preventive fungicides which must be applied before the disease symptoms appear and<\/p><p>repeated at interval of 3-4 weeks at the susceptible coffee berry development stages<\/p><p>(expansion- hardening)<\/p><p>Active Ingredient- Copper Oxychloride (50% metallic copper)<\/p><p>Formulation- Wettable powder<\/p><p>Rate of application- 70gms+45gms Rova 75% WP in 20l of water<\/p><p>&nbsp;<\/p><p>RESTRAINTS:<\/p><p>• DO NOT apply this product when hot conditions (35°C) or frosts are likely to occur as damage can result.<\/p><p>• DO NOT apply to copper shy varieties<\/p><p>• DO NOT apply to wet foliage<\/p><p>• DO NOT use this product during poor drying conditions<\/p>"
            ],
            "image": "e2c3829a80b8407a0ae5cbbbc8bb7ec4.png"
        },
        {
            "id": 86,
            "name": "Champion 50",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": [],
            "application_details": [
                "<figure class=\"table\"><table><tbody><tr><td><p>DISEASE&nbsp;CONTROLLED<\/p><p>&nbsp;<\/p><p>COFFEE<\/p><\/td><td>RATE<\/td><td>APPLICATION INFORMATION<\/td><\/tr><tr><td><p>Coffee&nbsp;Berry&nbsp;Disease&nbsp;(CDB)<\/p><p>Colletotrichum&nbsp;kahawae<\/p><\/td><td><p>140&nbsp;gms&nbsp;in&nbsp;20L&nbsp;of&nbsp;water<\/p><p>105&nbsp;gms&nbsp;in&nbsp;15L&nbsp;of&nbsp;water<\/p><p>7.7 &nbsp;kg &nbsp;\/&nbsp;hectare<\/p><\/td><td>Start&nbsp;spraying&nbsp;at&nbsp;the&nbsp;onset&nbsp;of rains&nbsp;and&nbsp;repeat&nbsp;every&nbsp;21&nbsp;days<\/td><\/tr><tr><td>Coffee&nbsp;Leaf&nbsp;Rust<\/td><td>70&nbsp;gms&nbsp;in&nbsp;20L&nbsp;of&nbsp;water<\/td><td>in&nbsp;combination&nbsp;with&nbsp;an&nbsp;approvedorganic&nbsp;fungicide&nbsp;at&nbsp;the<\/td><\/tr><tr><td>(Hemileia&nbsp;vastatrix)<\/td><td>52.5&nbsp;gms&nbsp;in&nbsp;15L&nbsp;of&nbsp;water<\/td><td>recommended&nbsp;rates<\/td><\/tr><tr><td>&nbsp;<\/td><td>3.5-5.0&nbsp;kg &nbsp;\/&nbsp;hectare<\/td><td>&nbsp;<\/td><\/tr><tr><td><p>&nbsp;<\/p><p>FRENCH&nbsp;BEANS<\/p><\/td><td>&nbsp;<\/td><td>&nbsp;<\/td><\/tr><tr><td><p>&nbsp;<\/p><p>Anthracnose<\/p><\/td><td>2&nbsp;kg\/ha<\/td><td>Spray volume&nbsp;of&nbsp;1000 &nbsp;L&nbsp;per&nbsp;hectare<\/td><\/tr><tr><td>Angular&nbsp;leaf&nbsp;spot<\/td><td>&nbsp;<\/td><td>&nbsp;<\/td><\/tr><tr><td>Sclerotinia<\/td><td>&nbsp;<\/td><td>Apply&nbsp;on&nbsp;a&nbsp;preventive&nbsp;programme<\/td><\/tr><tr><td><p>&nbsp;<\/p><p>ROSE<\/p><\/td><td>&nbsp;<\/td><td>&nbsp;<\/td><\/tr><tr><td>Botrytis<\/td><td>2&nbsp;kg\/ha<\/td><td>Spray&nbsp;volume of1000&nbsp;L&nbsp;per&nbsp;hectare<\/td><\/tr><tr><td>Black&nbsp;spots<\/td><td>&nbsp;<\/td><td>Apply&nbsp;as&nbsp;soon&nbsp;as&nbsp;the&nbsp;ﬁrst&nbsp;signs&nbsp;of&nbsp;the&nbsp;diseasesappear<\/td><\/tr><tr><td>&nbsp;<\/td><td>&nbsp;<\/td><td>and&nbsp;repeatafter&nbsp;7&nbsp;days&nbsp;until &nbsp;the&nbsp;disease&nbsp;pressure&nbsp;drop<\/td><\/tr><tr><td>&nbsp;<\/td><td>&nbsp;<\/td><td>below the&nbsp;economic&nbsp;threshold<\/td><\/tr><tr><td><p>&nbsp;<\/p><p>TOMATO<\/p><\/td><td>&nbsp;<\/td><td>&nbsp;<\/td><\/tr><tr><td><p>&nbsp;<\/p><p>Late blight<\/p><\/td><td><p>&nbsp;<\/p><p>1&nbsp;kg\/ha<\/p><\/td><td>Spray volume&nbsp;of&nbsp;1000 &nbsp;L&nbsp;per&nbsp;hectare<\/td><\/tr><tr><td>(Phytophthora infestans)<\/td><td>&nbsp;<\/td><td><p>&nbsp;<\/p><p>Start&nbsp;spraying&nbsp;at&nbsp;the&nbsp;first&nbsp;signs&nbsp;of&nbsp;late&nbsp;blightor&nbsp;when<\/p><\/td><\/tr><tr><td>&nbsp;<\/td><td>&nbsp;<\/td><td>the&nbsp;prevailing&nbsp;weather&nbsp;is&nbsp;conducive&nbsp;for &nbsp;late&nbsp;blight<\/td><\/tr><tr><td>&nbsp;<\/td><td>&nbsp;<\/td><td>manifestation.<\/td><\/tr><\/tbody><\/table><\/figure>"
            ],
            "image": "2ff55d58ee6a2f881a4df22aa35a7ed9.png"
        },
        {
            "id": 85,
            "name": "Champflo",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": null,
            "application_details": null,
            "image": null
        },
        {
            "id": 84,
            "name": "Xentari (Bacillus Thuringiensis)",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": null,
            "application_details": null,
            "image": null
        },
        {
            "id": 83,
            "name": "Vitra 40",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": null,
            "application_details": null,
            "image": null
        },
        {
            "id": 82,
            "name": "Trichotec",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": null,
            "application_details": null,
            "image": null
        },
        {
            "id": 81,
            "name": "Trianum P 11.5 WP",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": null,
            "application_details": null,
            "image": null
        },
        {
            "id": 80,
            "name": "Trianum P 11.5 WP",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": null,
            "application_details": null,
            "image": null
        },
        {
            "id": 79,
            "name": "Supreme (Metarhizium anisopliae)",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": null,
            "application_details": null,
            "image": null
        },
        {
            "id": 78,
            "name": "Sulcop",
            "pcpb_number": null,
            "manufacturer": null,
            "distributor": null,
            "category": "Biocontrol",
            "contact_details": null,
            "external_links": null,
            "application_details": null,
            "image": null
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/commercial_organic\/datatable?page=1",
    "from": 1,
    "last_page": 6,
    "last_page_url": "http:\/\/localhost\/api\/commercial_organic\/datatable?page=6",
    "next_page_url": "http:\/\/localhost\/api\/commercial_organic\/datatable?page=2",
    "path": "http:\/\/localhost\/api\/commercial_organic\/datatable",
    "per_page": "16",
    "prev_page_url": null,
    "to": 16,
    "total": 83
}
```
<div id="execution-results-GETapi-commercial_organic-datatable" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic-datatable"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic-datatable"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic-datatable" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic-datatable"></code></pre>
</div>
<form id="form-GETapi-commercial_organic-datatable" data-method="GET" data-path="api/commercial_organic/datatable" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic-datatable', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/datatable</code></b>
</p>
</form>


## api/commercial_organic/names




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/names" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/names"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/names'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/names',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 200,
    "message": "83 Items found",
    "success": true,
    "data": [
        {
            "id": 31,
            "name": "Achieve (Metarhizium anisopliae)",
            "pests_disease_weed": []
        },
        {
            "id": 4,
            "name": "Achook",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Diamondback moth"
                },
                {
                    "name": "Thrips"
                },
                {
                    "name": "Termites"
                }
            ]
        },
        {
            "id": 61,
            "name": "Agricop 50",
            "pests_disease_weed": [
                {
                    "name": "Coffeeberry Disease (CBD)"
                }
            ]
        },
        {
            "id": 60,
            "name": "Agriculo Organic",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "White Flies"
                },
                {
                    "name": "Root Knot Nematode"
                },
                {
                    "name": "Diamondback moth"
                }
            ]
        },
        {
            "id": 5,
            "name": "Amblytech",
            "pests_disease_weed": [
                {
                    "name": "Thrips"
                },
                {
                    "name": "Spidermites"
                }
            ]
        },
        {
            "id": 62,
            "name": "Amicop 50",
            "pests_disease_weed": [
                {
                    "name": "Coffeeberry Disease (CBD)"
                }
            ]
        },
        {
            "id": 63,
            "name": "Aminen",
            "pests_disease_weed": [
                {
                    "name": "Root Knot Nematode"
                }
            ]
        },
        {
            "id": 32,
            "name": "Aphiscout",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                }
            ]
        },
        {
            "id": 33,
            "name": "Aphitech (Aphidius transcaspinus, parasitic wasp)",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                }
            ]
        },
        {
            "id": 34,
            "name": "Baciguard (Bacillus Thuringiensis)",
            "pests_disease_weed": [
                {
                    "name": "Caterpillar"
                },
                {
                    "name": "Leaf Roller"
                }
            ]
        },
        {
            "id": 35,
            "name": "Beauvitech (Beauveria bassiana)",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                }
            ]
        },
        {
            "id": 38,
            "name": "Bio Cure 1.5 WP",
            "pests_disease_weed": []
        },
        {
            "id": 64,
            "name": "Bio Dewcon",
            "pests_disease_weed": [
                {
                    "name": "Powdery Mildew"
                },
                {
                    "name": "Downey Mildew"
                },
                {
                    "name": "Rust"
                }
            ]
        },
        {
            "id": 65,
            "name": "Bio Nematon",
            "pests_disease_weed": [
                {
                    "name": "Root Knot Nematode"
                }
            ]
        },
        {
            "id": 66,
            "name": "Bio-Chance",
            "pests_disease_weed": [
                {
                    "name": "Powdery Mildew"
                },
                {
                    "name": "Downey Mildew"
                }
            ]
        },
        {
            "id": 42,
            "name": "Biocatch",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 43,
            "name": "Biomagic (Metarhizium anisopliae)",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 67,
            "name": "Biophyto (Phytoseiulus persimilis)",
            "pests_disease_weed": [
                {
                    "name": "Spidermites"
                }
            ]
        },
        {
            "id": 44,
            "name": "Biopower (Beauveria bassiana)",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Diamondback moth"
                }
            ]
        },
        {
            "id": 7,
            "name": "Bioscimitus",
            "pests_disease_weed": []
        },
        {
            "id": 68,
            "name": "BN3 (Bacillus Thuringiensis)",
            "pests_disease_weed": [
                {
                    "name": "Diamondback moth"
                }
            ]
        },
        {
            "id": 45,
            "name": "Botanigard (Beauveria bassiana)",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                }
            ]
        },
        {
            "id": 46,
            "name": "Campaign (Metarhizium anisopliae)",
            "pests_disease_weed": [
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 47,
            "name": "Capsanem paste (Steinernema carpocapsae)",
            "pests_disease_weed": [
                {
                    "name": "Caterpillar"
                }
            ]
        },
        {
            "id": 85,
            "name": "Champflo",
            "pests_disease_weed": [
                {
                    "name": "Early Blight"
                }
            ]
        },
        {
            "id": 86,
            "name": "Champion 50",
            "pests_disease_weed": [
                {
                    "name": "Leaf Spot"
                },
                {
                    "name": "Anthracnose"
                },
                {
                    "name": "Coffeeberry Disease (CBD)"
                },
                {
                    "name": "Rust"
                },
                {
                    "name": "Late Blight"
                },
                {
                    "name": "Botrytis"
                },
                {
                    "name": "Black Spots"
                }
            ]
        },
        {
            "id": 87,
            "name": "Cobox 50",
            "pests_disease_weed": [
                {
                    "name": "Coffeeberry Disease (CBD)"
                },
                {
                    "name": "Rust"
                },
                {
                    "name": "Bacterial blight"
                },
                {
                    "name": "Early Blight"
                },
                {
                    "name": "Late Blight"
                }
            ]
        },
        {
            "id": 88,
            "name": "Cupravit",
            "pests_disease_weed": [
                {
                    "name": "Coffeeberry Disease (CBD)"
                },
                {
                    "name": "Rust"
                }
            ]
        },
        {
            "id": 89,
            "name": "Cuprocaffaro",
            "pests_disease_weed": [
                {
                    "name": "Coffeeberry Disease (CBD)"
                },
                {
                    "name": "Rust"
                },
                {
                    "name": "Early Blight"
                },
                {
                    "name": "Late Blight"
                },
                {
                    "name": "Anthracnose"
                }
            ]
        },
        {
            "id": 90,
            "name": "Curenox",
            "pests_disease_weed": [
                {
                    "name": "Coffeeberry Disease (CBD)"
                },
                {
                    "name": "Rust"
                },
                {
                    "name": "Early Blight"
                },
                {
                    "name": "Late Blight"
                }
            ]
        },
        {
            "id": 91,
            "name": "Delfin (Bacillus Thuringiensis)",
            "pests_disease_weed": [
                {
                    "name": "Diamondback moth"
                }
            ]
        },
        {
            "id": 48,
            "name": "Delta Trap",
            "pests_disease_weed": [
                {
                    "name": "Diamondback moth"
                },
                {
                    "name": "Tuta Absoluta \/Tomato Leafminer"
                },
                {
                    "name": "Leafminer"
                }
            ]
        },
        {
            "id": 49,
            "name": "Diglytech (Diglyphus isaea)",
            "pests_disease_weed": [
                {
                    "name": "Tuta Absoluta \/Tomato Leafminer"
                },
                {
                    "name": "Leafminer"
                }
            ]
        },
        {
            "id": 8,
            "name": "Flower",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                }
            ]
        },
        {
            "id": 9,
            "name": "Fortune",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                }
            ]
        },
        {
            "id": 93,
            "name": "Funguran 50",
            "pests_disease_weed": [
                {
                    "name": "Early Blight"
                }
            ]
        },
        {
            "id": 94,
            "name": "GC-3EC",
            "pests_disease_weed": [
                {
                    "name": "Powdery Mildew"
                }
            ]
        },
        {
            "id": 50,
            "name": "Halt Neo (Bacillus Thuringiensis)",
            "pests_disease_weed": [
                {
                    "name": "Diamondback moth"
                },
                {
                    "name": "African Army Worm"
                },
                {
                    "name": "Army Worm"
                }
            ]
        },
        {
            "id": 10,
            "name": "Hypotech (Hypsaspis miles)",
            "pests_disease_weed": [
                {
                    "name": "Tuta Absoluta \/Tomato Leafminer"
                },
                {
                    "name": "Leafminer"
                }
            ]
        },
        {
            "id": 59,
            "name": "Isacop",
            "pests_disease_weed": [
                {
                    "name": "Coffeeberry Disease (CBD)"
                }
            ]
        },
        {
            "id": 41,
            "name": "Lecatech (Verticillium (Lecanicillium)",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 11,
            "name": "Levo",
            "pests_disease_weed": []
        },
        {
            "id": 12,
            "name": "Limonica",
            "pests_disease_weed": []
        },
        {
            "id": 14,
            "name": "Macro_Mite",
            "pests_disease_weed": [
                {
                    "name": "Caterpillar"
                }
            ]
        },
        {
            "id": 15,
            "name": "Magneto",
            "pests_disease_weed": [
                {
                    "name": "Caterpillar"
                }
            ]
        },
        {
            "id": 40,
            "name": "Magneto",
            "pests_disease_weed": [
                {
                    "name": "Caterpillar"
                },
                {
                    "name": "Tuta Absoluta \/Tomato Leafminer"
                },
                {
                    "name": "Spidermites"
                },
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 69,
            "name": "Mazao Regain",
            "pests_disease_weed": [
                {
                    "name": "Powdery Mildew"
                }
            ]
        },
        {
            "id": 70,
            "name": "Mazao Sustain",
            "pests_disease_weed": [
                {
                    "name": "Root Knot Nematode"
                }
            ]
        },
        {
            "id": 71,
            "name": "Mytech WP",
            "pests_disease_weed": [
                {
                    "name": "Root Knot Nematode"
                }
            ]
        },
        {
            "id": 16,
            "name": "Neemark",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Thrips"
                }
            ]
        },
        {
            "id": 72,
            "name": "Neemraj",
            "pests_disease_weed": [
                {
                    "name": "Root Knot Nematode"
                }
            ]
        },
        {
            "id": 17,
            "name": "Neemroc",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Diamondback moth"
                },
                {
                    "name": "Thrips"
                }
            ]
        },
        {
            "id": 18,
            "name": "Nematech (Heterorhabditis bacteriophora)",
            "pests_disease_weed": [
                {
                    "name": "Caterpillar"
                },
                {
                    "name": "Thrips"
                }
            ]
        },
        {
            "id": 73,
            "name": "NemGuard",
            "pests_disease_weed": [
                {
                    "name": "Root Knot Nematode"
                }
            ]
        },
        {
            "id": 74,
            "name": "Nemroc",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Diamondback moth"
                },
                {
                    "name": "Thrips"
                }
            ]
        },
        {
            "id": 19,
            "name": "Nimbecidine",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Tuta Absoluta \/Tomato Leafminer"
                },
                {
                    "name": "Thrips"
                },
                {
                    "name": "Leafminer"
                },
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 21,
            "name": "Ozoneem",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Thrips"
                },
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 75,
            "name": "Pacyclos (Paecilomyces fumosoroseus)",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 22,
            "name": "Peril",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                }
            ]
        },
        {
            "id": 23,
            "name": "Pesthrin",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                }
            ]
        },
        {
            "id": 51,
            "name": "Phytotech (Phytoseiulus persimilis)",
            "pests_disease_weed": [
                {
                    "name": "Spidermites"
                }
            ]
        },
        {
            "id": 76,
            "name": "PL Plus",
            "pests_disease_weed": [
                {
                    "name": "Root Knot Nematode"
                }
            ]
        },
        {
            "id": 77,
            "name": "Prev AM60",
            "pests_disease_weed": [
                {
                    "name": "Powdery Mildew"
                }
            ]
        },
        {
            "id": 24,
            "name": "Pyagro",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Diamondback moth"
                }
            ]
        },
        {
            "id": 25,
            "name": "Pyegar",
            "pests_disease_weed": []
        },
        {
            "id": 26,
            "name": "Pyeneem",
            "pests_disease_weed": []
        },
        {
            "id": 36,
            "name": "Pyretrone",
            "pests_disease_weed": [
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 52,
            "name": "Real Amblyseius Andersoni (Amblyseius andersoni)",
            "pests_disease_weed": [
                {
                    "name": "Spidermites"
                }
            ]
        },
        {
            "id": 28,
            "name": "Real Amblyseius Cucumeris",
            "pests_disease_weed": []
        },
        {
            "id": 53,
            "name": "Rolltech Trap",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Tuta Absoluta \/Tomato Leafminer"
                },
                {
                    "name": "Leafminer"
                },
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 54,
            "name": "Spical (Neoseilus californicus (Anblyseius californicus))",
            "pests_disease_weed": [
                {
                    "name": "Spidermites"
                }
            ]
        },
        {
            "id": 55,
            "name": "Spidex (Phytoseiulus persimilis)",
            "pests_disease_weed": [
                {
                    "name": "Spidermites"
                }
            ]
        },
        {
            "id": 56,
            "name": "Sticktech Yellow",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                },
                {
                    "name": "Tuta Absoluta \/Tomato Leafminer"
                },
                {
                    "name": "Leafminer"
                },
                {
                    "name": "White Flies"
                }
            ]
        },
        {
            "id": 78,
            "name": "Sulcop",
            "pests_disease_weed": [
                {
                    "name": "Leaf Spot"
                }
            ]
        },
        {
            "id": 79,
            "name": "Supreme (Metarhizium anisopliae)",
            "pests_disease_weed": [
                {
                    "name": "Aphids"
                }
            ]
        },
        {
            "id": 57,
            "name": "Thripex (Amblyseis cucumeris)",
            "pests_disease_weed": [
                {
                    "name": "Thrips"
                },
                {
                    "name": "Spidermites"
                }
            ]
        },
        {
            "id": 80,
            "name": "Trianum P 11.5 WP",
            "pests_disease_weed": [
                {
                    "name": "Fusarium"
                }
            ]
        },
        {
            "id": 81,
            "name": "Trianum P 11.5 WP",
            "pests_disease_weed": [
                {
                    "name": "Fusarium"
                }
            ]
        },
        {
            "id": 82,
            "name": "Trichotec",
            "pests_disease_weed": [
                {
                    "name": "Fusarium"
                }
            ]
        },
        {
            "id": 30,
            "name": "Trilogy",
            "pests_disease_weed": []
        },
        {
            "id": 83,
            "name": "Vitra 40",
            "pests_disease_weed": [
                {
                    "name": "Downey Mildew"
                },
                {
                    "name": "Rust"
                }
            ]
        },
        {
            "id": 58,
            "name": "Wing Trap",
            "pests_disease_weed": [
                {
                    "name": "Diamondback moth"
                }
            ]
        },
        {
            "id": 84,
            "name": "Xentari (Bacillus Thuringiensis)",
            "pests_disease_weed": [
                {
                    "name": "Caterpillar"
                }
            ]
        }
    ]
}
```
<div id="execution-results-GETapi-commercial_organic-names" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic-names"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic-names"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic-names" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic-names"></code></pre>
</div>
<form id="form-GETapi-commercial_organic-names" data-method="GET" data-path="api/commercial_organic/names" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic-names', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/names</code></b>
</p>
</form>


## Performs search on commercial organic records based on query parameter values
Returns only name, id and image
Query parameter keys are the columns




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/summary/names/qui" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/summary/names/qui"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/summary/names/qui'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/summary/names/qui',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 90,
            "name": "Curenox",
            "image": "cdb2832eaa2a09fc0827943758f9f81b.png",
            "pests_disease_weed": [
                {
                    "name": "Coffeeberry Disease (CBD)"
                },
                {
                    "name": "Rust"
                },
                {
                    "name": "Early Blight"
                },
                {
                    "name": "Late Blight"
                }
            ]
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/commercial_organic\/summary\/names\/qui?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/commercial_organic\/summary\/names\/qui?page=1",
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/commercial_organic\/summary\/names\/qui",
    "per_page": "16",
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```
<div id="execution-results-GETapi-commercial_organic-summary-names--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic-summary-names--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic-summary-names--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic-summary-names--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic-summary-names--search_value--"></code></pre>
</div>
<form id="form-GETapi-commercial_organic-summary-names--search_value--" data-method="GET" data-path="api/commercial_organic/summary/names/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic-summary-names--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/summary/names/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-commercial_organic-summary-names--search_value--" data-component="url"  hidden>
<br>

</p>
</form>


## api/commercial_organic/summary/count/control_methods




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/summary/count/control_methods" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/summary/count/control_methods"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/summary/count/control_methods'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/summary/count/control_methods',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "total": 45
}
```
<div id="execution-results-GETapi-commercial_organic-summary-count-control_methods" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic-summary-count-control_methods"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic-summary-count-control_methods"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic-summary-count-control_methods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic-summary-count-control_methods"></code></pre>
</div>
<form id="form-GETapi-commercial_organic-summary-count-control_methods" data-method="GET" data-path="api/commercial_organic/summary/count/control_methods" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic-summary-count-control_methods', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/summary/count/control_methods</code></b>
</p>
</form>


## api/commercial_organic/summary/count/pdw




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/summary/count/pdw" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/summary/count/pdw"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/summary/count/pdw'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/summary/count/pdw',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "total": 74
}
```
<div id="execution-results-GETapi-commercial_organic-summary-count-pdw" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic-summary-count-pdw"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic-summary-count-pdw"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic-summary-count-pdw" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic-summary-count-pdw"></code></pre>
</div>
<form id="form-GETapi-commercial_organic-summary-count-pdw" data-method="GET" data-path="api/commercial_organic/summary/count/pdw" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic-summary-count-pdw', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/summary/count/pdw</code></b>
</p>
</form>


## Performs aggregations on commercial organic records based on query parameter values
Returns total
Query parameter keys are the columns




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/summary/count/et" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/summary/count/et"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/summary/count/et'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/summary/count/et',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "total": 12
}
```
<div id="execution-results-GETapi-commercial_organic-summary-count--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic-summary-count--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic-summary-count--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic-summary-count--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic-summary-count--search_value--"></code></pre>
</div>
<form id="form-GETapi-commercial_organic-summary-count--search_value--" data-method="GET" data-path="api/commercial_organic/summary/count/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic-summary-count--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/summary/count/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-commercial_organic-summary-count--search_value--" data-component="url"  hidden>
<br>

</p>
</form>


## api/commercial_organic/{id}/agrochem




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/omnis/agrochem" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/omnis/agrochem"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/omnis/agrochem'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/omnis/agrochem',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```
<div id="execution-results-GETapi-commercial_organic--id--agrochem" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic--id--agrochem"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic--id--agrochem"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic--id--agrochem" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic--id--agrochem"></code></pre>
</div>
<form id="form-GETapi-commercial_organic--id--agrochem" data-method="GET" data-path="api/commercial_organic/{id}/agrochem" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic--id--agrochem', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/{id}/agrochem</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-commercial_organic--id--agrochem" data-component="url" required  hidden>
<br>

</p>
</form>


## api/commercial_organic/{id}/control_methods




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/fuga/control_methods" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/fuga/control_methods"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/fuga/control_methods'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/fuga/control_methods',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-commercial_organic--id--control_methods" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic--id--control_methods"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic--id--control_methods"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic--id--control_methods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic--id--control_methods"></code></pre>
</div>
<form id="form-GETapi-commercial_organic--id--control_methods" data-method="GET" data-path="api/commercial_organic/{id}/control_methods" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic--id--control_methods', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/{id}/control_methods</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-commercial_organic--id--control_methods" data-component="url" required  hidden>
<br>

</p>
</form>


## api/commercial_organic/{id}/gap




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/veritatis/gap" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/veritatis/gap"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/veritatis/gap'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/veritatis/gap',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```
<div id="execution-results-GETapi-commercial_organic--id--gap" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic--id--gap"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic--id--gap"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic--id--gap" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic--id--gap"></code></pre>
</div>
<form id="form-GETapi-commercial_organic--id--gap" data-method="GET" data-path="api/commercial_organic/{id}/gap" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic--id--gap', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/{id}/gap</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-commercial_organic--id--gap" data-component="url" required  hidden>
<br>

</p>
</form>


## api/commercial_organic/{id}/homemade_organic




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/pariatur/homemade_organic" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/pariatur/homemade_organic"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/pariatur/homemade_organic'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/pariatur/homemade_organic',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```
<div id="execution-results-GETapi-commercial_organic--id--homemade_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic--id--homemade_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic--id--homemade_organic"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic--id--homemade_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic--id--homemade_organic"></code></pre>
</div>
<form id="form-GETapi-commercial_organic--id--homemade_organic" data-method="GET" data-path="api/commercial_organic/{id}/homemade_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic--id--homemade_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/{id}/homemade_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-commercial_organic--id--homemade_organic" data-component="url" required  hidden>
<br>

</p>
</form>


## api/commercial_organic/{id}/pdw




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/hic/pdw" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/hic/pdw"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/hic/pdw'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/hic/pdw',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-commercial_organic--id--pdw" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic--id--pdw"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic--id--pdw"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic--id--pdw" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic--id--pdw"></code></pre>
</div>
<form id="form-GETapi-commercial_organic--id--pdw" data-method="GET" data-path="api/commercial_organic/{id}/pdw" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic--id--pdw', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/{id}/pdw</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-commercial_organic--id--pdw" data-component="url" required  hidden>
<br>

</p>
</form>


## Find commercial organic item based on given ID.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/non" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/non"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/non'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/commercial_organic/non',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 911,
        "name": "Sed viverra",
        "pcpb_number": "PCPB(CR)9999",
        "manufacturer": "Vivamus diam ligula",
        "distributor": "Vivamus diam ligula",
        "category": "Biocontrol",
        "contact_details": "<h3>Vivamus diam ligulah3><p>House , 5th Floor<\/p><\/p>",
        "external_links": [
            "<p><a href=\"http:\/\/www.vivamusdiamligula.com\/sed_viverra\/\">http:\/\/www.vivamusdiamligula.com\/sed_viverra\/<\/a><\/p>"
        ],
        "application_details": [
            "<p>Quisque eu nunc volutpat, sodales arcu quis, varius metus. Nulla vitae laoreet felis. Duis finibus faucibus eros, at gravida enim porta ut<\/p>"
        ],
        "image": "d4bb5367896cc5ce4d39d20e2a1859e4a.jpg",
        "pests_diseases_weed": [
            {
                "id": 282,
                "name": "Duis eget",
                "type": "Pest",
                "scientific_name": "Vestibulum luctus",
                "description_pest": "Vivamus diam ligula, finibus id risus vel, vestibulum bibendum enim",
                "description_impact": "Nullam sit amet magna massa. Quisque cursus tempor nunc",
                "image": "ee24145d7ba03b23458bf8cab608b447.png",
                "references": "https:\/\/www.accumsan.org\/duiseget"
            }
        ],
        "control_methods": [
            {
                "id": 5,
                "name": "Biopesticide Control Methods for Duis eget",
                "category": "Biopesticide",
                "options": [
                    "Etiam gravida dapibus felis.",
                    "Etiam gravida dapibus felis."
                ],
                "external_links": [
                    "Vestibulum luctus rutrum elit. Fusce fringilla"
                ],
                "image": "87dd00a40e9b9d95b00212382dec361a.jpg"
            }
        ]
    }
}
```
> Example response (404, Item not found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-commercial_organic--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic--id-"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic--id-"></code></pre>
</div>
<form id="form-GETapi-commercial_organic--id-" data-method="GET" data-path="api/commercial_organic/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-commercial_organic--id-" data-component="url" required  hidden>
<br>

</p>
</form>



