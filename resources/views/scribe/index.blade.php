<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Safer Inputs API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;python&quot;,&quot;php&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                            <a href="#" data-language-name="python">python</a>
                            <a href="#" data-language-name="php">php</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI (Swagger) spec</a></li>
                            <li><a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: June 17 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>This is a guide on how to access and manipulate resources for the safer inputs database.   </p>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre><h1>Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p><h1>Active Ingredients</h1>
<p>Active Ingredient resource requests</p>
<h2>Add active ingredient</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Adds a new active ingredient item to database</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/active_ingredients" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"name":"id","potential_harm":{},"aquatic":{},"aquatic_desc":{},"bees":{},"bees_desc":{},"earthworm":{},"earthworm_desc":{},"birds":{},"birds_desc":{},"leachability":{},"leachability_desc":{},"carcinogenicity":{},"mutagenicity":{},"edc":{},"reproduction":{},"ache":{},"neurotoxicant":{},"who_classification":{},"eu_approved":{}}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "name": "id",
    "potential_harm": {},
    "aquatic": {},
    "aquatic_desc": {},
    "bees": {},
    "bees_desc": {},
    "earthworm": {},
    "earthworm_desc": {},
    "birds": {},
    "birds_desc": {},
    "leachability": {},
    "leachability_desc": {},
    "carcinogenicity": {},
    "mutagenicity": {},
    "edc": {},
    "reproduction": {},
    "ache": {},
    "neurotoxicant": {},
    "who_classification": {},
    "eu_approved": {}
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients'
payload = {
    "name": "id",
    "potential_harm": {},
    "aquatic": {},
    "aquatic_desc": {},
    "bees": {},
    "bees_desc": {},
    "earthworm": {},
    "earthworm_desc": {},
    "birds": {},
    "birds_desc": {},
    "leachability": {},
    "leachability_desc": {},
    "carcinogenicity": {},
    "mutagenicity": {},
    "edc": {},
    "reproduction": {},
    "ache": {},
    "neurotoxicant": {},
    "who_classification": {},
    "eu_approved": {}
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/active_ingredients',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'id',
            'potential_harm' =&gt; [],
            'aquatic' =&gt; [],
            'aquatic_desc' =&gt; [],
            'bees' =&gt; [],
            'bees_desc' =&gt; [],
            'earthworm' =&gt; [],
            'earthworm_desc' =&gt; [],
            'birds' =&gt; [],
            'birds_desc' =&gt; [],
            'leachability' =&gt; [],
            'leachability_desc' =&gt; [],
            'carcinogenicity' =&gt; [],
            'mutagenicity' =&gt; [],
            'edc' =&gt; [],
            'reproduction' =&gt; [],
            'ache' =&gt; [],
            'neurotoxicant' =&gt; [],
            'who_classification' =&gt; [],
            'eu_approved' =&gt; [],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 201,
    "message": "Saved",
    "success": true,
    "data": {
        "id": 76,
        "name": "Loremus Chloridus",
        "potential_harm": null,
        "aquatic": null,
        "aquatic_desc": null,
        "bees": null,
        "bees_desc": null,
        "earthworm": null,
        "earthworm_desc": null,
        "birds": null,
        "birds_desc": null,
        "leachability": null,
        "leachability_desc": null,
        "carcinogenicity": null,
        "mutagenicity": null,
        "edc": null,
        "reproduction": null,
        "ache": null,
        "neurotoxicant": null,
        "who_classification": null,
        "eu_approved": null,
        "image": null
    }
}</code></pre>
<blockquote>
<p>Example response (501, Active ingredient not created):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 501,
    "message": "Not Created",
    "success": false
}</code></pre>
<div id="execution-results-POSTapi-active_ingredients" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-active_ingredients"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-active_ingredients"></code></pre>
</div>
<div id="execution-error-POSTapi-active_ingredients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-active_ingredients"></code></pre>
</div>
<form id="form-POSTapi-active_ingredients" data-method="POST" data-path="api/active_ingredients" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-active_ingredients', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/active_ingredients</code></b>
</p>
<p>
<label id="auth-POSTapi-active_ingredients" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-active_ingredients" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-active_ingredients" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>aquatic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>bees</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>earthworm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>birds</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>leachability</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>

</form>
<h2>Update active ingredient</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Updates the active ingredient based on the ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/active_ingredients/et" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"name":"corrupti","potential_harm":{},"aquatic":{},"aquatic_desc":{},"bees":{},"bees_desc":{},"earthworm":{},"earthworm_desc":{},"birds":{},"birds_desc":{},"leachability":{},"leachability_desc":{},"carcinogenicity":{},"mutagenicity":{},"edc":{},"reproduction":{},"ache":{},"neurotoxicant":{},"who_classification":{},"eu_approved":{}}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/et"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "name": "corrupti",
    "potential_harm": {},
    "aquatic": {},
    "aquatic_desc": {},
    "bees": {},
    "bees_desc": {},
    "earthworm": {},
    "earthworm_desc": {},
    "birds": {},
    "birds_desc": {},
    "leachability": {},
    "leachability_desc": {},
    "carcinogenicity": {},
    "mutagenicity": {},
    "edc": {},
    "reproduction": {},
    "ache": {},
    "neurotoxicant": {},
    "who_classification": {},
    "eu_approved": {}
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/et'
payload = {
    "name": "corrupti",
    "potential_harm": {},
    "aquatic": {},
    "aquatic_desc": {},
    "bees": {},
    "bees_desc": {},
    "earthworm": {},
    "earthworm_desc": {},
    "birds": {},
    "birds_desc": {},
    "leachability": {},
    "leachability_desc": {},
    "carcinogenicity": {},
    "mutagenicity": {},
    "edc": {},
    "reproduction": {},
    "ache": {},
    "neurotoxicant": {},
    "who_classification": {},
    "eu_approved": {}
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/active_ingredients/et',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'corrupti',
            'potential_harm' =&gt; [],
            'aquatic' =&gt; [],
            'aquatic_desc' =&gt; [],
            'bees' =&gt; [],
            'bees_desc' =&gt; [],
            'earthworm' =&gt; [],
            'earthworm_desc' =&gt; [],
            'birds' =&gt; [],
            'birds_desc' =&gt; [],
            'leachability' =&gt; [],
            'leachability_desc' =&gt; [],
            'carcinogenicity' =&gt; [],
            'mutagenicity' =&gt; [],
            'edc' =&gt; [],
            'reproduction' =&gt; [],
            'ache' =&gt; [],
            'neurotoxicant' =&gt; [],
            'who_classification' =&gt; [],
            'eu_approved' =&gt; [],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 201,
    "message": "Updated",
    "success": true,
    "data": {
        "id": 76,
        "name": "Loremus Chloridus",
        "potential_harm": null,
        "aquatic": 0.028,
        "aquatic_desc": "Aquaticus Descreepticus",
        "bees": null,
        "bees_desc": null,
        "earthworm": null,
        "earthworm_desc": null,
        "birds": null,
        "birds_desc": null,
        "leachability": null,
        "leachability_desc": null,
        "carcinogenicity": null,
        "mutagenicity": null,
        "edc": null,
        "reproduction": null,
        "ache": null,
        "neurotoxicant": null,
        "who_classification": null,
        "eu_approved": null,
        "image": null
    }
}</code></pre>
<blockquote>
<p>Example response (501, Update failed):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 501,
    "message": "Update Unsuccessful",
    "success": false
}</code></pre>
<div id="execution-results-PUTapi-active_ingredients--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-active_ingredients--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-active_ingredients--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-active_ingredients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-active_ingredients--id-"></code></pre>
</div>
<form id="form-PUTapi-active_ingredients--id-" data-method="PUT" data-path="api/active_ingredients/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-active_ingredients--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/active_ingredients/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-active_ingredients--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-active_ingredients--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-active_ingredients--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-active_ingredients--id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>aquatic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>bees</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>earthworm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>birds</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>leachability</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>

</form>
<h2>Delete active ingredient</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Deletes an active ingredient based on the id value</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/active_ingredients/recusandae" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/recusandae"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/recusandae'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/active_ingredients/recusandae',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 200,
    "message": "Deleted",
    "success": true,
    "data": null
}</code></pre>
<blockquote>
<p>Example response (501, Delete failed):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 501,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-DELETEapi-active_ingredients--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-active_ingredients--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-active_ingredients--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-active_ingredients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-active_ingredients--id-"></code></pre>
</div>
<form id="form-DELETEapi-active_ingredients--id-" data-method="DELETE" data-path="api/active_ingredients/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-active_ingredients--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/active_ingredients/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-active_ingredients--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-active_ingredients--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-active_ingredients--id-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Get all active ingredients</h2>
<p>Retrieve all active ingredients</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients?order_column=repellat&amp;order_direction=laborum&amp;per_page=ratione" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients"
);

let params = {
    "order_column": "repellat",
    "order_direction": "laborum",
    "per_page": "ratione",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients'
params = {
  'order_column': 'repellat',
  'order_direction': 'laborum',
  'per_page': 'ratione',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'order_column'=&gt; 'repellat',
            'order_direction'=&gt; 'laborum',
            'per_page'=&gt; 'ratione',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
  "data": [
     {
         "id": 1,
         "name": "At vero eos",
         "potential_harm": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "aquatic": 1.5,
         "aquatic_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "bees": 72,
         "bees_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "earthworm": 999,
         "earthworm_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "birds": 315,
         "birds_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "leachability": -19.89,
         "leachability_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "carcinogenicity": "No",
         "mutagenicity": "No Data",
         "edc": "No",
         "reproduction": "Possible",
         "ache": "No",
         "neurotoxicant": "No",
         "who_classification": "II",
         "eu_approved": "No",
         "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
         "agrochems": [
             {
                 "id": 99,
                 "product_name": "Curabitur",
                 "pcpb_number": "PCPB(CR)9999",
                 "distributing_company": "Donec sit amet. Ltd.",
                 "who_class": "II",
                 "toxic": 1,
                 "composition": "999g\/L as dui vitae ultricies",
                 "registrant": "Aenean facilisis ultrices dui tempus lacinia",
                 "type": null,
                 "phi_days": 99,
                 "image": "90c8539cfeef1fdbdfb6a3fff78567cf.jpg"
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
     "first": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=1",
     "last": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=4",
     "prev": null,
     "next": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=2"
  },
  "meta": {
     "current_page": 1,
     "from": 1,
     "last_page": 4,
     "path": "https://api.safeinputs.koan.co.ke/api/active_ingredients",
     "per_page": "16",
     "to": 16,
     "total": 60
  }
}</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-active_ingredients" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients"></code></pre>
</div>
<form id="form-GETapi-active_ingredients" data-method="GET" data-path="api/active_ingredients" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-active_ingredients" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-active_ingredients" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="per_page" data-endpoint="GETapi-active_ingredients" data-component="query"  hidden>
<br>

</p>
</form>
<h2>Search active ingredients</h2>
<p>Performs search on active ingredient records based on query parameter values</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/filter/sit?per_page=1&amp;order_direction=desc&amp;order_column=id&amp;potential_harm=adipisci&amp;aquatic_desc=voluptatum&amp;bees_desc=quo&amp;earthworm_desc=laudantium&amp;birds_desc=repellendus&amp;leachability_desc=et&amp;carcinogenicity=aperiam&amp;mutagenicity=temporibus&amp;edc=deserunt&amp;reproduction=ab&amp;ache=expedita&amp;neurotoxicant=harum&amp;who_classification=rem&amp;eu_approved=in" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/filter/sit"
);

let params = {
    "per_page": "1",
    "order_direction": "desc",
    "order_column": "id",
    "potential_harm": "adipisci",
    "aquatic_desc": "voluptatum",
    "bees_desc": "quo",
    "earthworm_desc": "laudantium",
    "birds_desc": "repellendus",
    "leachability_desc": "et",
    "carcinogenicity": "aperiam",
    "mutagenicity": "temporibus",
    "edc": "deserunt",
    "reproduction": "ab",
    "ache": "expedita",
    "neurotoxicant": "harum",
    "who_classification": "rem",
    "eu_approved": "in",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/filter/sit'
params = {
  'per_page': '1',
  'order_direction': 'desc',
  'order_column': 'id',
  'potential_harm': 'adipisci',
  'aquatic_desc': 'voluptatum',
  'bees_desc': 'quo',
  'earthworm_desc': 'laudantium',
  'birds_desc': 'repellendus',
  'leachability_desc': 'et',
  'carcinogenicity': 'aperiam',
  'mutagenicity': 'temporibus',
  'edc': 'deserunt',
  'reproduction': 'ab',
  'ache': 'expedita',
  'neurotoxicant': 'harum',
  'who_classification': 'rem',
  'eu_approved': 'in',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/filter/sit',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'per_page'=&gt; '1',
            'order_direction'=&gt; 'desc',
            'order_column'=&gt; 'id',
            'potential_harm'=&gt; 'adipisci',
            'aquatic_desc'=&gt; 'voluptatum',
            'bees_desc'=&gt; 'quo',
            'earthworm_desc'=&gt; 'laudantium',
            'birds_desc'=&gt; 'repellendus',
            'leachability_desc'=&gt; 'et',
            'carcinogenicity'=&gt; 'aperiam',
            'mutagenicity'=&gt; 'temporibus',
            'edc'=&gt; 'deserunt',
            'reproduction'=&gt; 'ab',
            'ache'=&gt; 'expedita',
            'neurotoxicant'=&gt; 'harum',
            'who_classification'=&gt; 'rem',
            'eu_approved'=&gt; 'in',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
  "data": [
     {
         "id": 1,
         "name": "At vero eos",
         "potential_harm": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "aquatic": 1.5,
         "aquatic_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "bees": 72,
         "bees_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "earthworm": 999,
         "earthworm_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "birds": 315,
         "birds_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "leachability": -19.89,
         "leachability_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
         "carcinogenicity": "No",
         "mutagenicity": "No Data",
         "edc": "No",
         "reproduction": "Possible",
         "ache": "No",
         "neurotoxicant": "No",
         "who_classification": "II",
         "eu_approved": "No",
         "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
         "agrochems": [
             {
                 "id": 99,
                 "product_name": "Curabitur",
                 "pcpb_number": "PCPB(CR)9999",
                 "distributing_company": "Donec sit amet. Ltd.",
                 "who_class": "II",
                 "toxic": 1,
                 "composition": "999g\/L as dui vitae ultricies",
                 "registrant": "Aenean facilisis ultrices dui tempus lacinia",
                 "type": null,
                 "phi_days": 99,
                 "image": "90c8539cfeef1fdbdfb6a3fff78567cf.jpg"
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
     "first": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=1",
     "last": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=4",
     "prev": null,
     "next": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=2"
  },
  "meta": {
     "current_page": 1,
     "from": 1,
     "last_page": 4,
     "path": "https://api.safeinputs.koan.co.ke/api/active_ingredients",
     "per_page": "16",
     "to": 16,
     "total": 60
  }
}</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-active_ingredients-filter--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-filter--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-filter--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-filter--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-filter--search_value--"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-filter--search_value--" data-method="GET" data-path="api/active_ingredients/filter/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-filter--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/filter/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
asc | desc
</p>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
*use query parameter names below*
</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no
</p>
</form>
<h2>Datatable</h2>
<p>Implementation for use with Datatables to populate table with active ingredients records.
Use the full request url in configuring the datatable.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/datatable" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/datatable"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/datatable'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/datatable',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
status = 200
{
     "current_page": 1,
     "data": [
         {
             "id": 1,
             "name": "At vero eos",
             "potential_harm": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
             "aquatic": 1.5,
             "aquatic_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
             "bees": 72,
             "bees_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
             "earthworm": 999,
             "earthworm_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
             "birds": 315,
             "birds_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
             "leachability": -19.89,
             "leachability_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
             "carcinogenicity": "No",
             "mutagenicity": "No Data",
             "edc": "No",
             "reproduction": "Possible",
             "ache": "No",
             "neurotoxicant": "No",
             "who_classification": "II",
             "eu_approved": "No",
             "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
         },
         .
         .
         .
     ],
     "first_page_url": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable?page=1",
     "from": 1,
     "last_page": 4,
     "last_page_url": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable?page=4",
     "next_page_url": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable?page=2",
     "path": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable",
     "per_page": "16",
     "prev_page_url": null,
     "to": 16,
     "total": 60
}</code></pre>
<div id="execution-results-GETapi-active_ingredients-datatable" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-datatable"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-datatable"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-datatable" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-datatable"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-datatable" data-method="GET" data-path="api/active_ingredients/datatable" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-datatable', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/datatable</code></b>
</p>
</form>
<h2>Get all active ingredient names</h2>
<p>Retrieve all active ingredient names.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/names" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/names"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/names'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/names',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
     "code": 200,
     "message": "60 Items found",
     "success": true,
     "data": [
         {
             "id": 15,
             "name": "Acephate"
         },
         {
             "id": 23,
             "name": "Acrinathrin"
         },
         .
         .
         .
     ]
}</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-active_ingredients-names" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-names"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-names"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-names" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-names"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-names" data-method="GET" data-path="api/active_ingredients/names" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-names', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/names</code></b>
</p>
</form>
<h2>Get active ingredient names</h2>
<p>Returns only name, id and image.
Can be filtered based on query parameters</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/summary/names/sint?per_page=1&amp;order_direction=desc&amp;order_column=id&amp;name=voluptate&amp;potential_harm=officiis&amp;aquatic_desc=non&amp;bees_desc=harum&amp;earthworm_desc=eos&amp;birds_desc=quidem&amp;leachability_desc=eveniet&amp;carcinogenicity=consequuntur&amp;mutagenicity=iure&amp;edc=error&amp;reproduction=animi&amp;ache=saepe&amp;neurotoxicant=et&amp;who_classification=quae&amp;eu_approved=iure" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/summary/names/sint"
);

let params = {
    "per_page": "1",
    "order_direction": "desc",
    "order_column": "id",
    "name": "voluptate",
    "potential_harm": "officiis",
    "aquatic_desc": "non",
    "bees_desc": "harum",
    "earthworm_desc": "eos",
    "birds_desc": "quidem",
    "leachability_desc": "eveniet",
    "carcinogenicity": "consequuntur",
    "mutagenicity": "iure",
    "edc": "error",
    "reproduction": "animi",
    "ache": "saepe",
    "neurotoxicant": "et",
    "who_classification": "quae",
    "eu_approved": "iure",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/summary/names/sint'
params = {
  'per_page': '1',
  'order_direction': 'desc',
  'order_column': 'id',
  'name': 'voluptate',
  'potential_harm': 'officiis',
  'aquatic_desc': 'non',
  'bees_desc': 'harum',
  'earthworm_desc': 'eos',
  'birds_desc': 'quidem',
  'leachability_desc': 'eveniet',
  'carcinogenicity': 'consequuntur',
  'mutagenicity': 'iure',
  'edc': 'error',
  'reproduction': 'animi',
  'ache': 'saepe',
  'neurotoxicant': 'et',
  'who_classification': 'quae',
  'eu_approved': 'iure',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/summary/names/sint',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'per_page'=&gt; '1',
            'order_direction'=&gt; 'desc',
            'order_column'=&gt; 'id',
            'name'=&gt; 'voluptate',
            'potential_harm'=&gt; 'officiis',
            'aquatic_desc'=&gt; 'non',
            'bees_desc'=&gt; 'harum',
            'earthworm_desc'=&gt; 'eos',
            'birds_desc'=&gt; 'quidem',
            'leachability_desc'=&gt; 'eveniet',
            'carcinogenicity'=&gt; 'consequuntur',
            'mutagenicity'=&gt; 'iure',
            'edc'=&gt; 'error',
            'reproduction'=&gt; 'animi',
            'ache'=&gt; 'saepe',
            'neurotoxicant'=&gt; 'et',
            'who_classification'=&gt; 'quae',
            'eu_approved'=&gt; 'iure',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
     "current_page": 1,
     "data": [
         {
             "id": 58,
             "name": "Esfenvalerate",
             "image": "b3e2c45c0551915175aeefdaf91d9c7a.png"
         },
         {
             "id": 57,
             "name": "Cypermethrin",
             "image": "f2341120f5a57a36e8a3813823ba1ae9.png"
         },
         .
         .
         .
     ],
     "first_page_url": "https://api.saferinputs.com/api/active_ingredients/summary/names?page=1",
     "from": 1,
     "last_page": 4,
     "last_page_url": "https://api.saferinputs.com/api/active_ingredients/summary/names?page=4",
     "next_page_url": "https://api.saferinputs.com/api/active_ingredients/summary/names?page=2",
     "path": "https://api.safeinputs.com/api/active_ingredients/summary/names",
     "per_page": "16",
     "prev_page_url": null,
     "to": 16,
     "total": 60
}</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-active_ingredients-summary-names--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-summary-names--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-summary-names--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-summary-names--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-summary-names--search_value--"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-summary-names--search_value--" data-method="GET" data-path="api/active_ingredients/summary/names/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-summary-names--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/summary/names/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
asc | desc
</p>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
*use query parameter names below*
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no
</p>
</form>
<h2>Get total of active ingredient&#039;s agrochem products</h2>
<p>Returns total</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/summary/count/agrochem?product_name=minima&amp;pcpb_number=qui&amp;distributing_company=laudantium&amp;who_class=nemo&amp;toxic=voluptas&amp;registrant=quis" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/summary/count/agrochem"
);

let params = {
    "product_name": "minima",
    "pcpb_number": "qui",
    "distributing_company": "laudantium",
    "who_class": "nemo",
    "toxic": "voluptas",
    "registrant": "quis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/summary/count/agrochem'
params = {
  'product_name': 'minima',
  'pcpb_number': 'qui',
  'distributing_company': 'laudantium',
  'who_class': 'nemo',
  'toxic': 'voluptas',
  'registrant': 'quis',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/summary/count/agrochem',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'product_name'=&gt; 'minima',
            'pcpb_number'=&gt; 'qui',
            'distributing_company'=&gt; 'laudantium',
            'who_class'=&gt; 'nemo',
            'toxic'=&gt; 'voluptas',
            'registrant'=&gt; 'quis',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "total": 99
}</code></pre>
<div id="execution-results-GETapi-active_ingredients-summary-count-agrochem" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-summary-count-agrochem"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-summary-count-agrochem"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-summary-count-agrochem" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-summary-count-agrochem"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-summary-count-agrochem" data-method="GET" data-path="api/active_ingredients/summary/count/agrochem" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-summary-count-agrochem', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/summary/count/agrochem</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
</form>
<h2>Get totals of active ingredients</h2>
<p>Performs aggregations on active ingredient records based on query parameter values
Returns total</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/summary/count/ratione?name=sint&amp;potential_harm=laboriosam&amp;aquatic_desc=consequatur&amp;bees_desc=quis&amp;earthworm_desc=fugiat&amp;birds_desc=aut&amp;leachability_desc=nemo&amp;carcinogenicity=ipsam&amp;mutagenicity=necessitatibus&amp;edc=modi&amp;reproduction=nemo&amp;ache=omnis&amp;neurotoxicant=ducimus&amp;who_classification=nostrum&amp;eu_approved=et" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/summary/count/ratione"
);

let params = {
    "name": "sint",
    "potential_harm": "laboriosam",
    "aquatic_desc": "consequatur",
    "bees_desc": "quis",
    "earthworm_desc": "fugiat",
    "birds_desc": "aut",
    "leachability_desc": "nemo",
    "carcinogenicity": "ipsam",
    "mutagenicity": "necessitatibus",
    "edc": "modi",
    "reproduction": "nemo",
    "ache": "omnis",
    "neurotoxicant": "ducimus",
    "who_classification": "nostrum",
    "eu_approved": "et",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/summary/count/ratione'
params = {
  'name': 'sint',
  'potential_harm': 'laboriosam',
  'aquatic_desc': 'consequatur',
  'bees_desc': 'quis',
  'earthworm_desc': 'fugiat',
  'birds_desc': 'aut',
  'leachability_desc': 'nemo',
  'carcinogenicity': 'ipsam',
  'mutagenicity': 'necessitatibus',
  'edc': 'modi',
  'reproduction': 'nemo',
  'ache': 'omnis',
  'neurotoxicant': 'ducimus',
  'who_classification': 'nostrum',
  'eu_approved': 'et',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/summary/count/ratione',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'name'=&gt; 'sint',
            'potential_harm'=&gt; 'laboriosam',
            'aquatic_desc'=&gt; 'consequatur',
            'bees_desc'=&gt; 'quis',
            'earthworm_desc'=&gt; 'fugiat',
            'birds_desc'=&gt; 'aut',
            'leachability_desc'=&gt; 'nemo',
            'carcinogenicity'=&gt; 'ipsam',
            'mutagenicity'=&gt; 'necessitatibus',
            'edc'=&gt; 'modi',
            'reproduction'=&gt; 'nemo',
            'ache'=&gt; 'omnis',
            'neurotoxicant'=&gt; 'ducimus',
            'who_classification'=&gt; 'nostrum',
            'eu_approved'=&gt; 'et',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "total": 99
}</code></pre>
<div id="execution-results-GETapi-active_ingredients-summary-count--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-summary-count--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-summary-count--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-summary-count--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-summary-count--search_value--"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-summary-count--search_value--" data-method="GET" data-path="api/active_ingredients/summary/count/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-summary-count--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/summary/count/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no
</p>
</form>
<h2>Find active ingredient&#039;s agrochem products</h2>
<p>Find agrochem products associated with the active ingredient based on id and column values provided by query params</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/quasi/agrochems?product_name=sapiente&amp;pcpb_number=aut&amp;distributing_company=nostrum&amp;who_class=qui&amp;toxic=aut&amp;registrant=voluptas" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/quasi/agrochems"
);

let params = {
    "product_name": "sapiente",
    "pcpb_number": "aut",
    "distributing_company": "nostrum",
    "who_class": "qui",
    "toxic": "aut",
    "registrant": "voluptas",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/quasi/agrochems'
params = {
  'product_name': 'sapiente',
  'pcpb_number': 'aut',
  'distributing_company': 'nostrum',
  'who_class': 'qui',
  'toxic': 'aut',
  'registrant': 'voluptas',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/quasi/agrochems',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'product_name'=&gt; 'sapiente',
            'pcpb_number'=&gt; 'aut',
            'distributing_company'=&gt; 'nostrum',
            'who_class'=&gt; 'qui',
            'toxic'=&gt; 'aut',
            'registrant'=&gt; 'voluptas',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
     "data": {
         "id": 290,
         "name": "Aenean",
         "potential_harm": null,
         "aquatic": 0.035,
         "aquatic_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem.&lt;/p&gt;",
         "bees": 50,
         "bees_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem.&lt;/p&gt;",
         "earthworm": 79,
         "earthworm_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem.&lt;/p&gt;",
         "birds": 4237,
         "birds_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem.&lt;/p&gt;",
         "leachability": 2.57,
         "leachability_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem.&lt;/p&gt;",
         "carcinogenicity": "No",
         "mutagenicity": "No Data",
         "edc": "Possible",
         "reproduction": "Possible",
         "ache": "No Data",
         "neurotoxicant": "Yes",
         "who_classification": "III",
         "eu_approved": "No",
         "image": "c96a9aec04ac2bba21fd8ed858sdf3bf.png",
         "agrochem": [
             {
                 "id": 322,
                 "product_name": "Curabitur",
                 "pcpb_number": "PCPB(CR)9999",
                 "distributing_company": "Duis feugiat magna",
                 "who_class": "III",
                 "toxic": 1,
                 "composition": "380 g/L",
                 "registrant": "Duis feugiat magna Co. Ltd",
                 "type": null,
                 "phi_days": 45,
                 "image": "436c77f117d073ea8ea2f4317abcf105.jpg"
             },
             .
             .
             .
         ]
     }
}</code></pre>
<blockquote>
<p>Example response (404, No agrochems found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-active_ingredients--id--agrochems" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id--agrochems"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id--agrochems"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id--agrochems" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id--agrochems"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id--agrochems" data-method="GET" data-path="api/active_ingredients/{id}/agrochems" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id--agrochems', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}/agrochems</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
</form>
<h2>Find active ingredient&#039;s commercial organic alternative products</h2>
<p>Find commercial organic alternatives for the agrochem product used for specific pests, diseases and weeds that contain the active ingredient based on its id and column values provided by query params associated with the commercial organic product</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/fuga/commercial_organic?name=et&amp;pcpb_number=dolor&amp;manufacturer=sed&amp;distributor=minima&amp;category=qui&amp;contact_details=commodi&amp;external_links=nostrum&amp;application_details=ut" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/fuga/commercial_organic"
);

let params = {
    "name": "et",
    "pcpb_number": "dolor",
    "manufacturer": "sed",
    "distributor": "minima",
    "category": "qui",
    "contact_details": "commodi",
    "external_links": "nostrum",
    "application_details": "ut",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/fuga/commercial_organic'
params = {
  'name': 'et',
  'pcpb_number': 'dolor',
  'manufacturer': 'sed',
  'distributor': 'minima',
  'category': 'qui',
  'contact_details': 'commodi',
  'external_links': 'nostrum',
  'application_details': 'ut',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/fuga/commercial_organic',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'name'=&gt; 'et',
            'pcpb_number'=&gt; 'dolor',
            'manufacturer'=&gt; 'sed',
            'distributor'=&gt; 'minima',
            'category'=&gt; 'qui',
            'contact_details'=&gt; 'commodi',
            'external_links'=&gt; 'nostrum',
            'application_details'=&gt; 'ut',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
"data": {
     "total": 2,
     "items": [
         {
             "id": 213,
             "name": " Quisque",
             "type": "Pest",
             "scientific_name": "meyricki caffeina",
             "description_pest": "Etiam efficitur porta quam, eget blandit lorem.",
             "description_impact": "Etiam efficitur porta quam, eget blandit lorem.&lt;",
             "image": "6a83920453f7369c9ca64a9552ef938d.jpg",
             "references": "",
             "commercial_organic": [
                 {
                     "id": 184,
                     "name": "Curabitur vestibulum",
                     "pcpb_number": "PCPB(CR)9999",
                     "manufacturer": "Mauris luctus maximus",
                     "distributor": "Sed accumsan ultric",
                     "category": "Biopesticide",
                     "contact_details": "Phasellus et dolor",
                     "external_links": "https://lorem.ipsum.com",
                     "application_details": "ed venenatis rhoncus urna, eu vehicula enim dictum in. Proin eget nisl ex. Aliquam finibus bibendum tortor volutpat ultricies. Nunc porta nisl id ultricies aliquam.",
                     "image": "de75345d3ba2eb753d06993a949a8702.png"
                 },
                 .
                 .
                 .
             ]
         },
         .
         .
         .
     ]
}</code></pre>
<blockquote>
<p>Example response (404, No commercial organic found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-active_ingredients--id--commercial_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id--commercial_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id--commercial_organic"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id--commercial_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id--commercial_organic"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id--commercial_organic" data-method="GET" data-path="api/active_ingredients/{id}/commercial_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id--commercial_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}/commercial_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>manufacturer</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="manufacturer" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributor" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>contact_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="contact_details" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>external_links</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="external_links" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>application_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="application_details" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
</form>
<h2>Find active ingredient&#039;s gap items</h2>
<p>Find gap alternatives for the agrochem product containing the active ingredient based on the active ingredient id and column values associated with the gap item provided by query params</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/similique/gap?name=repudiandae&amp;category=qui&amp;practices=culpa&amp;references=qui" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/similique/gap"
);

let params = {
    "name": "repudiandae",
    "category": "qui",
    "practices": "culpa",
    "references": "qui",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/similique/gap'
params = {
  'name': 'repudiandae',
  'category': 'qui',
  'practices': 'culpa',
  'references': 'qui',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/similique/gap',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'name'=&gt; 'repudiandae',
            'category'=&gt; 'qui',
            'practices'=&gt; 'culpa',
            'references'=&gt; 'qui',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
   "total": 4,
   "data": [
     {
        "id": 299,
        "name": "Donec",
        "type": "Pest",
        "scientific_name": "Duis sodales",
        "description_pest": "Phasellus eget ante dui. Mauris risus lectus, blandit ut nunc et, egestas pharetra ante. Donec eu arcu vulputate, pulvinar felis eu, aliquet tellus. ",
        "description_impact": "Quisque velit mi, molestie ac sem sit amet, molestie porta leo.",
        "image": "ba2p43f4660c05b43fefec4c73ab25c8.jpeg",
        "references": "https://www.ipsum-lorem.org.",
        "gap": [
             {
                 "id": 11,
                 "name": "Mauris risus lectus, blandit ut nunc ",
                 "category": [
                     "Prevention",
                     "Cultural",
                     "Physical"
                 ],
                 "practices": [
                     "&lt;h4&gt;&lt;strong&gt;Praesent feugiat&lt;/strong&gt;&lt;/h4&gt;&lt;ul&gt;&lt;li&gt;&lt;/li&gt;Nam quis mauris leo. Nunc nec tincidunt nulla, vel facilisis mauris. &lt;li&gt;Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.&lt;/li&gt;&lt;/ul&gt;",ate in day during dry periods.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;To monitor aphid populations, examine the undersides of the leaves and the bud areas for groups or colonies of aphids. Presence of ants may indicate presence of aphids. Early detection of aphids is important as they can multiply rapidly. Yellow traps are useful for monitoring the arrival of winged aphids to the crop.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Look for yellowing leaves, stunted growth and honeydew on infested crops. Sooty mould may grown on the honeydew.&lt;/li&gt;&lt;li&gt;Look for curled, wrinkled or cupped leaves and mosaic patterns on the leaves (alternating dark and light patches) - these are symptoms of viruses that can be transmitted by the aphid&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;Donec eu arcu vulputate, pulvinar felis eu, aliquet tellus. Donec vehicula felis turpis, sed sagittis metus ornare a.&lt;/p&gt;"
                 ],
                 "references": [
                     "&lt;ol&gt;&lt;li&gt;Maecenas quis elementum odio. Pellentesque iaculis tellus sem, ut sodales enim lobortis luctus.&lt;/li&gt;&lt;li&gt;Curabitur nec vulputate dolor.&lt;/li&gt;&lt;li&gt;Donec vehicula felis turpis, sed sagittis metus ornare a&lt;/li&gt;&lt;/ol&gt;"
                 ],
                 "image": "61d682a9c39bc7b1ce58856c0c324d3d.jpg"
             },
             .
             .
             .
        ]
     },
     .
     .
     .
   ]
}</code></pre>
<blockquote>
<p>Example response (404, No gap found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-active_ingredients--id--gap" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id--gap"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id--gap"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id--gap" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id--gap"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id--gap" data-method="GET" data-path="api/active_ingredients/{id}/gap" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id--gap', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}/gap</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id--gap" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients--id--gap" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category" data-endpoint="GETapi-active_ingredients--id--gap" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>practices</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="practices" data-endpoint="GETapi-active_ingredients--id--gap" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>references</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="references" data-endpoint="GETapi-active_ingredients--id--gap" data-component="query"  hidden>
<br>

</p>
</form>
<h2>Find active ingredient&#039;s homemade organic alternatives</h2>
<p>Find homemade organic items based on the active ingredient id and column values provided by query params</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/facere/homemade_organic?name=commodi&amp;practices=fugit&amp;external_links=voluptate&amp;references=dolorem" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/facere/homemade_organic"
);

let params = {
    "name": "commodi",
    "practices": "fugit",
    "external_links": "voluptate",
    "references": "dolorem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/facere/homemade_organic'
params = {
  'name': 'commodi',
  'practices': 'fugit',
  'external_links': 'voluptate',
  'references': 'dolorem',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/facere/homemade_organic',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'name'=&gt; 'commodi',
            'practices'=&gt; 'fugit',
            'external_links'=&gt; 'voluptate',
            'references'=&gt; 'dolorem',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
"data": {
     "total": 7,
     "items": [
         {
             "id": 213,
             "name": " Quisque",
             "type": "Pest",
             "scientific_name": "meyricki caffeina",
             "description_pest": "Etiam efficitur porta quam, eget blandit lorem.",
             "description_impact": "Etiam efficitur porta quam, eget blandit lorem.&lt;",
             "image": "6a83920453f7369c9ca64a9552ef938d.jpg",
             "references": "",
             "homemade_organic": [
                 {
                     "id": 238,
                     "name": "Vestibulum ante ipsum",
                     "practices": [
                         "&lt;p&gt;&lt;strong&gt;Phasellus:&lt;/strong&gt; Mauris a feugiat lectus. Proin nisl urna, condimentum id tortor nec, vulputate blandit nulla. Nullam consequat velit vel purus lacinia auctor..&lt;/p&gt;"
                     ],
                     "external_links": [
                         "https://lorem.ipsum.com"
                     ],
                     "references": [
                         "&lt;ol&gt;&lt;li&gt;Maecenas quis&lt;/li&gt;&lt;li&gt;Praesent feugiat, risus vel volutpat fermentum, diam quam viverra tortor, et convallis felis ex eget tellus&lt;/li&gt;&lt;/ol&gt;"
                     ],
                     "image": "de7dab8868ac792dea542d662c27a43f.jpg"
                 },
                 .
                 .
                 .
             ]
         },
         .
         .
         .
     ]
}</code></pre>
<blockquote>
<p>Example response (404, No homemade organic found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-active_ingredients--id--homemade_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id--homemade_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id--homemade_organic"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id--homemade_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id--homemade_organic"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id--homemade_organic" data-method="GET" data-path="api/active_ingredients/{id}/homemade_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id--homemade_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}/homemade_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>practices</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="practices" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>external_links</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="external_links" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>references</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="references" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="query"  hidden>
<br>

</p>
</form>
<h2>Find active ingredient based on ID</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/aut" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/aut"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/aut'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/aut',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
  "data": {
     "id": 1,
     "name": "At vero eos",
     "potential_harm": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
     "aquatic": 1.5,
     "aquatic_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
     "bees": 72,
     "bees_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
     "earthworm": 999,
     "earthworm_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
     "birds": 315,
     "birds_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
     "leachability": -19.89,
     "leachability_desc": "&lt;p&gt;Etiam efficitur porta quam, eget blandit lorem&lt;\/p&gt;",
     "carcinogenicity": "No",
     "mutagenicity": "No Data",
     "edc": "No",
     "reproduction": "Possible",
     "ache": "No",
     "neurotoxicant": "No",
     "who_classification": "II",
     "eu_approved": "No",
     "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
     "agrochems": [
         {
             "id": 99,
             "product_name": "Curabitur",
             "pcpb_number": "PCPB(CR)9999",
             "distributing_company": "Donec sit amet. Ltd.",
             "who_class": "II",
             "toxic": 1,
             "composition": "999g\/L as dui vitae ultricies",
             "registrant": "Aenean facilisis ultrices dui tempus lacinia",
             "type": null,
             "phi_days": 99,
             "image": "90c8539cfeef1fdbdfb6a3fff78567cf.jpg"
         },
         .
         .
         .

     ]
  }
}</code></pre>
<blockquote>
<p>Example response (404, Item not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-active_ingredients--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id-"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id-"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id-" data-method="GET" data-path="api/active_ingredients/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id-" data-component="url" required  hidden>
<br>

</p>
</form><h1>Agrochem</h1>
<p>Agrochem resource requests</p>
<h2>Add agrochem</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Adds a new agrochem product item to database</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/agrochem" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"product_name":"et","distributing_company":{},"pcpb_number":{},"toxic":{},"who_class":{},"composition":{},"registrant":{},"type":{},"phi_days":{},"image":{},"active_ingredients":{},"pests_disease_weed":{}}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "product_name": "et",
    "distributing_company": {},
    "pcpb_number": {},
    "toxic": {},
    "who_class": {},
    "composition": {},
    "registrant": {},
    "type": {},
    "phi_days": {},
    "image": {},
    "active_ingredients": {},
    "pests_disease_weed": {}
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem'
payload = {
    "product_name": "et",
    "distributing_company": {},
    "pcpb_number": {},
    "toxic": {},
    "who_class": {},
    "composition": {},
    "registrant": {},
    "type": {},
    "phi_days": {},
    "image": {},
    "active_ingredients": {},
    "pests_disease_weed": {}
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/agrochem',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'product_name' =&gt; 'et',
            'distributing_company' =&gt; [],
            'pcpb_number' =&gt; [],
            'toxic' =&gt; [],
            'who_class' =&gt; [],
            'composition' =&gt; [],
            'registrant' =&gt; [],
            'type' =&gt; [],
            'phi_days' =&gt; [],
            'image' =&gt; [],
            'active_ingredients' =&gt; [],
            'pests_disease_weed' =&gt; [],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 201,
    "message": "Saved",
    "success": true,
    "data": {
        "id": 1214,
        "product_name": "Vestibulum",
        "pcpb_number": "PCPB(CR)9999",
        "distributing_company": "Curabitur ac quam",
        "who_class": "II",
        "toxic": 1,
        "composition": "Meth",
        "registrant": "Vivamus vitae ligula",
        "type": null,
        "phi_days": 234,
        "image": null
    }
}</code></pre>
<blockquote>
<p>Example response (501, Agrochem not created):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 501,
    "message": "Not Created",
    "success": false
}</code></pre>
<div id="execution-results-POSTapi-agrochem" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-agrochem"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agrochem"></code></pre>
</div>
<div id="execution-error-POSTapi-agrochem" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agrochem"></code></pre>
</div>
<form id="form-POSTapi-agrochem" data-method="POST" data-path="api/agrochem" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-agrochem', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/agrochem</code></b>
</p>
<p>
<label id="auth-POSTapi-agrochem" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-agrochem" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product_name" data-endpoint="POSTapi-agrochem" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>phi_days</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phi_days" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>active_ingredients</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="active_ingredients" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pests_disease_weed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pests_disease_weed" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>

</form>
<h2>Update agrochem</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Updates the agrochem product based on the ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/agrochem/nemo" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"product_name":"numquam","distributing_company":{},"pcpb_number":{},"toxic":{},"who_class":{},"composition":{},"registrant":{},"type":{},"phi_days":{},"image":{},"active_ingredients":{},"pests_disease_weed":{}}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/nemo"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "product_name": "numquam",
    "distributing_company": {},
    "pcpb_number": {},
    "toxic": {},
    "who_class": {},
    "composition": {},
    "registrant": {},
    "type": {},
    "phi_days": {},
    "image": {},
    "active_ingredients": {},
    "pests_disease_weed": {}
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/nemo'
payload = {
    "product_name": "numquam",
    "distributing_company": {},
    "pcpb_number": {},
    "toxic": {},
    "who_class": {},
    "composition": {},
    "registrant": {},
    "type": {},
    "phi_days": {},
    "image": {},
    "active_ingredients": {},
    "pests_disease_weed": {}
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/agrochem/nemo',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'product_name' =&gt; 'numquam',
            'distributing_company' =&gt; [],
            'pcpb_number' =&gt; [],
            'toxic' =&gt; [],
            'who_class' =&gt; [],
            'composition' =&gt; [],
            'registrant' =&gt; [],
            'type' =&gt; [],
            'phi_days' =&gt; [],
            'image' =&gt; [],
            'active_ingredients' =&gt; [],
            'pests_disease_weed' =&gt; [],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 201,
    "message": "Updated",
    "success": true,
    "data": {
        "id": 1214,
        "product_name": "Vestibulum Update",
        "pcpb_number": "PCPB(CR)9999",
        "distributing_company": "Curabitur ac quam nullo",
        "who_class": "II",
        "toxic": 1,
        "composition": "Meth",
        "registrant": "Vivamus vitae ligula",
        "type": null,
        "phi_days": 234,
        "image": null
    }
}</code></pre>
<blockquote>
<p>Example response (501, Update failed):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 501,
    "message": "Update Unsuccessful",
    "success": false
}</code></pre>
<div id="execution-results-PUTapi-agrochem--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-agrochem--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-agrochem--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-agrochem--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-agrochem--id-"></code></pre>
</div>
<form id="form-PUTapi-agrochem--id-" data-method="PUT" data-path="api/agrochem/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-agrochem--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/agrochem/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-agrochem--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-agrochem--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-agrochem--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product_name" data-endpoint="PUTapi-agrochem--id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="type" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>phi_days</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phi_days" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>active_ingredients</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="active_ingredients" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pests_disease_weed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pests_disease_weed" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>

</form>
<h2>Delete agrochem</h2>
<p>Deletes an agrochem product based on the id value</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/agrochem/assumenda" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/assumenda"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/assumenda'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/agrochem/assumenda',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 200,
    "message": "Deleted",
    "success": true,
    "data": null
}</code></pre>
<blockquote>
<p>Example response (501, Delete failed):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 501,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-DELETEapi-agrochem--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-agrochem--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-agrochem--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-agrochem--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-agrochem--id-"></code></pre>
</div>
<form id="form-DELETEapi-agrochem--id-" data-method="DELETE" data-path="api/agrochem/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-agrochem--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/agrochem/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-agrochem--id-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Get all agrochem products</h2>
<p>Get all agrochem products</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem?order_column=culpa&amp;order_direction=saepe&amp;per_page=voluptate" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem"
);

let params = {
    "order_column": "culpa",
    "order_direction": "saepe",
    "per_page": "voluptate",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem'
params = {
  'order_column': 'culpa',
  'order_direction': 'saepe',
  'per_page': 'voluptate',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'order_column'=&gt; 'culpa',
            'order_direction'=&gt; 'saepe',
            'per_page'=&gt; 'voluptate',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
   "data": [{
         "id": 1999,
         "product_name": "Morbi fringilla",
         "pcpb_number": "PCPB(CR)9999",
         "distributing_company": "Sed elementum",
         "toxic": 1,
         "who_class": "II",
         "composition": "200g/L as paraquat ion",
         "registrant": "Nam eu erat rhoncus",
         "type": null,
         "phi_days": null,
         "crops": [
             {
                 "id": 1,
                 "name": "Donec",
                 "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
                 "pests_disease_weed": [
                     {
                         "id": 320,
                         "name": "Proin vulputate",
                         "type": "Disease",
                         "scientific_name": "Mauris elementum",
                         "description_pest": "Morbi eget odio tristique, venenatis metus eu, lobortis purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas",
                         "description_impact": "Donec fringilla enim ut convallis faucibus. Ut tempus turpis eget eros iaculis rhoncus. Cras aliquam nulla vitae felis ullamcorper ultrices.",
                         "image": "a53773d8c98ecedd1c2043eb1203c80a.jpg",
                         "references": "https://en.m.lorem.org/wiki"
                     },
                     .
                     .
                     .
                 ],
                 "agrochems": [
                     {
                         "id": 1123,
                         "product_name": "Ut maximus",
                         "pcpb_number": "PCPB(CR)9999",
                         "distributing_company": "Mauris a viv",
                         "who_class": "II",
                         "toxic": 1,
                         "composition": "200g/L as paraquat ion",
                         "registrant": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla",
                         "type": null,
                         "phi_days": null,
                         "image": "90c8cd35feef1fdbdfb6a3fff78567cf.jpg"
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
         "pests_disease_weed": [
             {
                 "id": 484,
                 "name": "Mmaximus",
                 "type": "Weed",
                 "scientific_name": null,
                 "description_pest": "&lt;p&gt;Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.&lt;/p&gt;",
                 "description_impact": "&lt;p&gt;&lt;strong&gt;Sed elementum&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.&lt;/p&gt;",
                 "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
                 "references": "&lt;ol&gt;&lt;li&gt;&lt;a href=\"https://www.upsim.org/lonet\"&gt;"
             },
             .
             .
             .
         ],
         "image": "90c8539cfeef1f2345b6a3fff78567cf.jpg",
         "active_ingredients": [
             {
                 "id": 1,
                 "name": "Proin feugiat",
                 "potential_harm": null,
                 "aquatic": 1.2,
                 "aquatic_desc": "&lt;p&gt;Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.&lt;/p&gt;",
                 "bees": 72,
                 "bees_desc": "&lt;p&gt; Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam&lt;/p&gt;",
                 "earthworm": 999,
                 "earthworm_desc": null,
                 "birds": 35,
                 "birds_desc": "&lt;p&gt;Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.&lt;/p&gt;",
                 "leachability": -6.89,
                 "leachability_desc": "&lt;p&gt;Mauris elementum ac lectus &lt;/p&gt;",
                 "carcinogenicity": "No",
                 "mutagenicity": "No Data",
                 "edc": "No",
                 "reproduction": "Possible",
                 "ache": "No",
                 "neurotoxicant": "No",
                 "who_classification": "II",
                 "eu_approved": "No",
                 "image": "ca211702a9941c4e0f2945750fb63c7e.png",
                 "agrochems": [
                     {
                         "id": 1,
                         "product_name": "Curabitun",
                         "pcpb_number": "PCPB(CR)9029",
                         "distributing_company": "Cras sed neque.",
                         "who_class": "II",
                         "toxic": 1,
                         "composition": "200g/L as paraquat ion",
                         "registrant": "Cras eget feugiat metus. Integer ultricies eu felis et laoreet..",
                         "type": null,
                         "phi_days": null,
                         "image": "90c8e234feef1fdbdfb6a3fff78567cf.jpg"
                     },
                     .
                     .
                     .
                 ]
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
         "first": "https://api.safeinputs.koan.co.ke/api/agrochem?page=1",
         "last": "https://api.safeinputs.koan.co.ke/api/agrochem?page=8",
         "prev": null,
         "next": "https://api.safeinputs.koan.co.ke/api/agrochem?page=2"
   },
   "meta": {
         "current_page": 1,
         "from": 1,
         "last_page": 8,
         "path": "https://api.safeinputs.koan.co.ke/api/agrochem",
         "per_page": "16",
         "to": 16,
         "total": 113
   }
}</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem"></code></pre>
</div>
<form id="form-GETapi-agrochem" data-method="GET" data-path="api/agrochem" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="per_page" data-endpoint="GETapi-agrochem" data-component="query"  hidden>
<br>

</p>
</form>
<h2>Search Agrochem Products</h2>
<p>Performs search on agrochem product records based on query parameter values
Query parameter keys are the columns</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/filter/similique?product_name=minima&amp;pcpb_number=sit&amp;distributing_company=provident&amp;composition=tenetur&amp;registrant=tempore&amp;toxic=temporibus&amp;who_class=fugit" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/filter/similique"
);

let params = {
    "product_name": "minima",
    "pcpb_number": "sit",
    "distributing_company": "provident",
    "composition": "tenetur",
    "registrant": "tempore",
    "toxic": "temporibus",
    "who_class": "fugit",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/filter/similique'
params = {
  'product_name': 'minima',
  'pcpb_number': 'sit',
  'distributing_company': 'provident',
  'composition': 'tenetur',
  'registrant': 'tempore',
  'toxic': 'temporibus',
  'who_class': 'fugit',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/filter/similique',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'product_name'=&gt; 'minima',
            'pcpb_number'=&gt; 'sit',
            'distributing_company'=&gt; 'provident',
            'composition'=&gt; 'tenetur',
            'registrant'=&gt; 'tempore',
            'toxic'=&gt; 'temporibus',
            'who_class'=&gt; 'fugit',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
    "data": [
         {
             "id": 1999,
             "product_name": "Morbi fringilla",
             "pcpb_number": "PCPB(CR)9999",
             "distributing_company": "Sed elementum",
             "toxic": 1,
             "who_class": "II",
             "composition": "200g/L as paraquat ion",
             "registrant": "Nam eu erat rhoncus",
             "type": null,
             "phi_days": null,
             "crops": [
                 {
                     "id": 1,
                     "name": "Donec",
                     "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
                     "pests_disease_weed": [
                         {
                             "id": 320,
                             "name": "Proin vulputate",
                             "type": "Disease",
                             "scientific_name": "Mauris elementum",
                             "description_pest": "Morbi eget odio tristique, venenatis metus eu, lobortis purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas",
                             "description_impact": "Donec fringilla enim ut convallis faucibus. Ut tempus turpis eget eros iaculis rhoncus. Cras aliquam nulla vitae felis ullamcorper ultrices.",
                             "image": "a53773d8c98ecedd1c2043eb1203c80a.jpg",
                             "references": "https://en.m.lorem.org/wiki"
                         },
                         .
                         .
                         .
                     ],
                     "agrochems": [
                         {
                             "id": 1123,
                             "product_name": "Ut maximus",
                             "pcpb_number": "PCPB(CR)9999",
                             "distributing_company": "Mauris a viv",
                             "who_class": "II",
                             "toxic": 1,
                             "composition": "200g/L as paraquat ion",
                             "registrant": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla",
                             "type": null,
                             "phi_days": null,
                             "image": "90c8cd35feef1fdbdfb6a3fff78567cf.jpg"
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
             "pests_disease_weed": [
                 {
                     "id": 484,
                     "name": "Mmaximus",
                     "type": "Weed",
                     "scientific_name": null,
                     "description_pest": "&lt;p&gt;Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.&lt;/p&gt;",
                     "description_impact": "&lt;p&gt;&lt;strong&gt;Sed elementum&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.&lt;/p&gt;",
                     "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
                     "references": "&lt;ol&gt;&lt;li&gt;&lt;a href=\"https://www.upsim.org/lonet\"&gt;"
                 },
                 .
                 .
                 .
             ],
             "image": "90c8539cfeef1f2345b6a3fff78567cf.jpg",
             "active_ingredients": [
                 {
                     "id": 1,
                     "name": "Proin feugiat",
                     "potential_harm": null,
                     "aquatic": 1.2,
                     "aquatic_desc": "&lt;p&gt;Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.&lt;/p&gt;",
                     "bees": 72,
                     "bees_desc": "&lt;p&gt; Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam&lt;/p&gt;",
                     "earthworm": 999,
                     "earthworm_desc": null,
                     "birds": 35,
                     "birds_desc": "&lt;p&gt;Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.&lt;/p&gt;",
                     "leachability": -6.89,
                     "leachability_desc": "&lt;p&gt;Mauris elementum ac lectus &lt;/p&gt;",
                     "carcinogenicity": "No",
                     "mutagenicity": "No Data",
                     "edc": "No",
                     "reproduction": "Possible",
                     "ache": "No",
                     "neurotoxicant": "No",
                     "who_classification": "II",
                     "eu_approved": "No",
                     "image": "ca211702a9941c4e0f2945750fb63c7e.png",
                     "agrochems": [
                         {
                             "id": 1,
                             "product_name": "Curabitun",
                             "pcpb_number": "PCPB(CR)9029",
                             "distributing_company": "Cras sed neque.",
                             "who_class": "II",
                             "toxic": 1,
                             "composition": "200g/L as paraquat ion",
                             "registrant": "Cras eget feugiat metus. Integer ultricies eu felis et laoreet..",
                             "type": null,
                             "phi_days": null,
                             "image": "90c8e234feef1fdbdfb6a3fff78567cf.jpg"
                         },
                         .
                         .
                         .
                     ]
                 },
                 .
                 .
                 .
             ]
         },
     ],
     "links": {
         "first": "https://api.safeinputs.koan.co.ke/api/agrochem/filter?page=1",
         "last": "https://api.safeinputs.koan.co.ke/api/agrochem/filter?page=8",
         "prev": null,
         "next": "https://api.safeinputs.koan.co.ke/api/agrochem/filter?page=2"
     },
     "meta": {
         "current_page": 1,
         "from": 1,
         "last_page": 8,
         "path": "https://api.safeinputs.koan.co.ke/api/agrochem/filter",
         "per_page": "16",
         "to": 16,
         "total": 114
     }
 }</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem-filter--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-filter--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-filter--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-filter--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-filter--search_value--"></code></pre>
</div>
<form id="form-GETapi-agrochem-filter--search_value--" data-method="GET" data-path="api/agrochem/filter/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-filter--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/filter/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
</form>
<h2>Datatable</h2>
<p>Implementation for Datatables API to populate table with agrochem records</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/datatable" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/datatable"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/datatable'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/datatable',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
     "current_page": 1,
     "data": [
         {
             "id": 1999,
             "product_name": "Morbi fringilla",
             "pcpb_number": "PCPB(CR)9999",
             "distributing_company": "Sed elementum",
             "toxic": 1,
             "who_class": "II",
             "composition": "200g/L as paraquat ion",
             "registrant": "Nam eu erat rhoncus",
             "type": "tocix",
             "phi_days": 234,
             "image": "7b77642dc9863c22194b26a21da24614.jpg"
         },
         .
         .
         .
     ],
     "first_page_url": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable?page=1",
     "from": 1,
     "last_page": 8,
     "last_page_url": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable?page=8",
     "next_page_url": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable?page=2",
     "path": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable",
     "per_page": "16",
     "prev_page_url": null,
     "to": 16,
     "total": 114
}</code></pre>
<div id="execution-results-GETapi-agrochem-datatable" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-datatable"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-datatable"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-datatable" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-datatable"></code></pre>
</div>
<form id="form-GETapi-agrochem-datatable" data-method="GET" data-path="api/agrochem/datatable" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-datatable', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/datatable</code></b>
</p>
</form>
<h2>Get agrochem names</h2>
<p>Retrieve all agrochem product names</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/names" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/names"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/names'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/names',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
   "code": 200,
   "message": "113 Items found",
   "success": true,
   "data": [
         {
             "id": 109,
             "product_name": "Curabitur"
         },
         {
             "id": 96,
             "product_name": "Vivamus"
         },
         .
         .
         .
    ]
}</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem-names" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-names"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-names"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-names" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-names"></code></pre>
</div>
<form id="form-GETapi-agrochem-names" data-method="GET" data-path="api/agrochem/names" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-names', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/names</code></b>
</p>
</form>
<h2>Get agrochem names - with image</h2>
<p>Performs search on agrochem product records based on query parameter values</br>
Returns only name, id and image</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/summary/names/asperiores?per_page=1&amp;order_direction=desc&amp;order_column=id%2A&amp;product_name=porro&amp;pcpb_number=sed&amp;distributing_company=facere&amp;composition=dolor&amp;registrant=in&amp;toxic=nihil&amp;who_class=ab" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/summary/names/asperiores"
);

let params = {
    "per_page": "1",
    "order_direction": "desc",
    "order_column": "id*",
    "product_name": "porro",
    "pcpb_number": "sed",
    "distributing_company": "facere",
    "composition": "dolor",
    "registrant": "in",
    "toxic": "nihil",
    "who_class": "ab",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/summary/names/asperiores'
params = {
  'per_page': '1',
  'order_direction': 'desc',
  'order_column': 'id*',
  'product_name': 'porro',
  'pcpb_number': 'sed',
  'distributing_company': 'facere',
  'composition': 'dolor',
  'registrant': 'in',
  'toxic': 'nihil',
  'who_class': 'ab',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/summary/names/asperiores',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'per_page'=&gt; '1',
            'order_direction'=&gt; 'desc',
            'order_column'=&gt; 'id*',
            'product_name'=&gt; 'porro',
            'pcpb_number'=&gt; 'sed',
            'distributing_company'=&gt; 'facere',
            'composition'=&gt; 'dolor',
            'registrant'=&gt; 'in',
            'toxic'=&gt; 'nihil',
            'who_class'=&gt; 'ab',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
     "current_page": 1,
     "data": [
         {
             "id": 115,
             "product_name": "Dummy",
             "image": "1a7f07ce0c95d1aa64e3b0522ec69a21.jpg"
         },
         .
         .
         .
     ],
     "first_page_url": "https://api.saferinputs.com/api/agrochem/summary/names?page=1",
     "from": 1,
     "last_page": 8,
     "last_page_url": "https://api.saferinputs.com/api/agrochem/summary/names?page=8",
     "next_page_url": "https://api.saferinputs.com/api/agrochem/summary/names?page=2",
     "path": "https://api.saferinputs.com/api/agrochem/summary/names",
     "per_page": "16",
     "prev_page_url": null,
     "to": 16,
     "total": 114
}</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem-summary-names--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-summary-names--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-summary-names--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-summary-names--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-summary-names--search_value--"></code></pre>
</div>
<form id="form-GETapi-agrochem-summary-names--search_value--" data-method="GET" data-path="api/agrochem/summary/names/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-summary-names--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/summary/names/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>
asc | desc
</p>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>
*use query parameter names below*
</p>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
</form>
<h2>Get totals of agrochem products</h2>
<p>Performs aggregations on agrochem records based on query parameter values </br>
Returns total</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/summary/count/enim?product_name=quia&amp;pcpb_number=voluptatibus&amp;distributing_company=odit&amp;composition=maiores&amp;registrant=dolorem&amp;toxic=alias&amp;who_class=vero" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/summary/count/enim"
);

let params = {
    "product_name": "quia",
    "pcpb_number": "voluptatibus",
    "distributing_company": "odit",
    "composition": "maiores",
    "registrant": "dolorem",
    "toxic": "alias",
    "who_class": "vero",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/summary/count/enim'
params = {
  'product_name': 'quia',
  'pcpb_number': 'voluptatibus',
  'distributing_company': 'odit',
  'composition': 'maiores',
  'registrant': 'dolorem',
  'toxic': 'alias',
  'who_class': 'vero',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/summary/count/enim',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'product_name'=&gt; 'quia',
            'pcpb_number'=&gt; 'voluptatibus',
            'distributing_company'=&gt; 'odit',
            'composition'=&gt; 'maiores',
            'registrant'=&gt; 'dolorem',
            'toxic'=&gt; 'alias',
            'who_class'=&gt; 'vero',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "total": 99
}</code></pre>
<div id="execution-results-GETapi-agrochem-summary-count--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-summary-count--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-summary-count--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-summary-count--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-summary-count--search_value--"></code></pre>
</div>
<form id="form-GETapi-agrochem-summary-count--search_value--" data-method="GET" data-path="api/agrochem/summary/count/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-summary-count--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/summary/count/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
</form>
<h2>Find agrochem active ingredients</h2>
<p>Find the agrochem product's active ingredients based on the id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/atque/active_ingredients" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/atque/active_ingredients"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/atque/active_ingredients'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/atque/active_ingredients',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
   "data": {
         "id": 913,
         "product_name": "Vivamus",
         "pcpb_number": "PCPB(CR)9970",
         "distributing_company": "Nunc rhoncus blandit mi sed dapibus",
         "who_class": "II",
         "toxic": 1,
         "composition": "Mauris vel magna",
         "registrant": "&lt;p&gt;Aenean sit amet sapien nulla. Nullam efficitur auctor mi blandit malesuada.&lt;/p&gt;",
         "type": null,
         "phi_days": 14,
         "image": "7b77642dc98e2122194b26a21dd2c614.jpeg",
         "active_ingredients": [
             {
                 "id": 1215,
                 "name": "Proin feugiat",
                 "potential_harm": null,
                 "aquatic": 1.2,
                 "aquatic_desc": "&lt;p&gt;Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.&lt;/p&gt;",
                 "bees": 72,
                 "bees_desc": "&lt;p&gt; Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam&lt;/p&gt;",
                 "earthworm": 999,
                 "earthworm_desc": null,
                 "birds": 35,
                 "birds_desc": "&lt;p&gt;Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.&lt;/p&gt;",
                 "leachability": -6.89,
                 "leachability_desc": "&lt;p&gt;Mauris elementum ac lectus &lt;/p&gt;",
                 "carcinogenicity": "No",
                 "mutagenicity": "No Data",
                 "edc": "No",
                 "reproduction": "Possible",
                 "ache": "No",
                 "neurotoxicant": "No",
                 "who_classification": "II",    "eu_approved": "No",
                 "image "ca211702a9941c4e0f2945750fb63c7e.png",
             },
             .
             .
             .
         ]
   }
}</code></pre>
<blockquote>
<p>Example response (404, No Active Ingredients):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem--id--active_ingredients" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--active_ingredients"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--active_ingredients"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--active_ingredients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--active_ingredients"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--active_ingredients" data-method="GET" data-path="api/agrochem/{id}/active_ingredients" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--active_ingredients', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/active_ingredients</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--active_ingredients" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Find agrochem commercial organic alternatives</h2>
<p>Find commercial organic alternative products to handle specific pests based on the agrochem product id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/sunt/commercial_organic" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/sunt/commercial_organic"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/sunt/commercial_organic'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/sunt/commercial_organic',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
   "total": 4,
   "data": [
         {
             "id": 9,
             "name": "Morbi",
             "type": "Pest",
             "scientific_name": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla fringilla egestas feugiat. Cras sed neque elementum, facilisis",
             "description_pest": "Proin interdum, ligula nec ultricies suscipit, ipsum ipsum pretium justo, vel blandit lorem tortor ac est",
             "description_impact": "Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue .",
             "image": "ba2e5bf4660c05b43d2123c4c73ab25c8.jpeg",
             "references": "https://www.donec-erat.org/",
             "commercial_organic": [
                 {
                     "id": 4,
                     "name": "Phasellus",
                     "pcpb_number": "PCPB(CR)9999",
                     "manufacturer": "Nulla ex",
                     "distributor": "Nulla ex",
                     "category": "Biocontrol",
                     "contact_details": "Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna. Suspendisse at tellus lorem.",
                     "external_links": [
                         "&lt;p&gt;www.justo-etiam.com&lt;/p&gt;",
                     ],
                     "application_details": [
                         "Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec,"
                     ],
                     "image": "1a240c031237a16a16291e9643f3ed8.jpg"
                 },
                 .
                 .
                 .
             ]
         },
         .
         .
         .
   ]
}</code></pre>
<blockquote>
<p>Example response (404, No Commercial Organic Found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem--id--commercial_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--commercial_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--commercial_organic"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--commercial_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--commercial_organic"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--commercial_organic" data-method="GET" data-path="api/agrochem/{id}/commercial_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--commercial_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/commercial_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--commercial_organic" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Find agrochem crops</h2>
<p>Find crops associated with the agrochem product based on its id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/qui/crops" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/qui/crops"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/qui/crops'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/qui/crops',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
   "data": {
         "id": 1999,
         "product_name": "Morbi fringilla",
         "pcpb_number": "PCPB(CR)9999",
         "distributing_company": "Sed elementum",
         "toxic": 1,
         "who_class": "II",
         "composition": "200g/L as paraquat ion",
         "registrant": "Nam eu erat rhoncus",
         "type": null,
         "phi_days": null,
         "crops": [
             {
                 "id": 1,
                 "name": "Donec",
                 "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
             },
             .
             .
             .
         ]
   }
}</code></pre>
<blockquote>
<p>Example response (404, No Crops Found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem--id--crops" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--crops"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--crops"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--crops" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--crops"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--crops" data-method="GET" data-path="api/agrochem/{id}/crops" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--crops', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/crops</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--crops" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Find agrochem homemade organic alternatives</h2>
<p>Find homemade organic alternatives to handle specific pests based on the agrochem product id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/sit/homemade_organic" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/sit/homemade_organic"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/sit/homemade_organic'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/sit/homemade_organic',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
   "total": 2,
   "data": [
         {
             "id": 9,
             "name": "Morbi",
             "type": "Pest",
             "scientific_name": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla fringilla egestas feugiat. Cras sed neque elementum, facilisis",
             "description_pest": "Proin interdum, ligula nec ultricies suscipit, ipsum ipsum pretium justo, vel blandit lorem tortor ac est",
             "description_impact": "Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue .",
             "image": "ba2e5bf4660c05b43d2123c4c73ab25c8.jpeg",
             "references": "https://www.donec-erat.org/",
             "homemade_organic": [
                 {
                     "id": 322,
                     "name": "Proin feugiat massa quam",
                     "practices": [
                         "&lt;p&gt;Nam eu erat rhoncus, sollicitudin arcu eu, consequat neque. Nulla ex velit, ullamcorper quis ante vel, maximus tincidunt eros. Vestibulum auctor ante sit amet nisi pulvinar ultricies.&lt;/p&gt;",
                         .
                         .
                         .
                     ],
                     "external_links": [
                         "&lt;p&gt;1.Duis convallis, elit eget posuere vulputate, nunc dui&lt;/p&gt;",
                         "&lt;p&gt;2. https://www.ultrices-velit.org/&lt;/p&gt;",
                         .
                         .
                         .
                     ],
                     "references": [
                         "https://www.ultrices-velit.org",
                         .
                         .
                         .
                     ],
                     "image": "55a34637157a757f60003f86179221a1.jpg"
                 },
                 .
                 .
                 .
             ]
         },
         .
         .
         .
   ]
}</code></pre>
<blockquote>
<p>Example response (404, No Homemade Organic):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem--id--homemade_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--homemade_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--homemade_organic"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--homemade_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--homemade_organic"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--homemade_organic" data-method="GET" data-path="api/agrochem/{id}/homemade_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--homemade_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/homemade_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--homemade_organic" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Find agrochem GAP alternatives</h2>
<p>Find alternative good agricultural practices (GAP) to handle specific pests based on the agrochem product id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/sequi/gap" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/sequi/gap"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/sequi/gap'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/sequi/gap',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
     "total": 2,
     "data": [
         {
             "id": 9,
             "name": "Morbi",
             "type": "Pest",
             "scientific_name": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla fringilla egestas feugiat. Cras sed neque elementum, facilisis",
             "description_pest": "Proin interdum, ligula nec ultricies suscipit, ipsum ipsum pretium justo, vel blandit lorem tortor ac est",
             "description_impact": "Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue .",
             "image": "ba2e5bf4660c05b43d2123c4c73ab25c8.jpeg",
             "references": "https://www.donec-erat.org/",
             "gap": [
                 {
                     "id": 23,
                     "name": "Mauris a viverra",
                     "category": [
                         "Cultural",
                         "Physical",
                         "Prevention"
                     ],
                     "practices": [
                         "&lt;h4&gt;&lt;strong&gt;Donec fringilla&lt;/strong&gt;&lt;/h4&gt;&lt;ol&gt;&lt;li&gt;Nam eu erat rhoncus, sollicitudin arcu eu, consequat neque. Nulla ex velit, ullamcorper qu&lt;/li&gt;&lt;/ol&gt;",
                     ],
                     "references": [
                         "&lt;ol&gt;&lt;li&gt;&lt;a href=\"https://www.nisi-convallis.org/\"&gt;https://www.nisi-convallis.org/&lt;/a&gt;&lt;/li&gt;&lt;/ol&gt;"
                     ],
                     "image": "23456803e306dd09538a811ed4ee067d.jpg"
                 },
                 .
                 .
                 .
             ]
         },
         .
         .
         .
     ]
}</code></pre>
<blockquote>
<p>Example response (404, No Homemade Organic):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem--id--gap" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--gap"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--gap"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--gap" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--gap"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--gap" data-method="GET" data-path="api/agrochem/{id}/gap" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--gap', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/gap</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--gap" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Find agrochem pests, diseases, weeds</h2>
<p>Find pests, diseases, weeds controlled by the  agrochem product based on the agrochem product's id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/magnam/pdw" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/magnam/pdw"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/magnam/pdw'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/magnam/pdw',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
   "data": {
         "id": 913,
         "product_name": "Vivamus",
         "pcpb_number": "PCPB(CR)9970",
         "distributing_company": "Nunc rhoncus blandit mi sed dapibus",
         "who_class": "II",
         "toxic": 1,
         "composition": "Mauris vel magna",
         "registrant": "&lt;p&gt;Aenean sit amet sapien nulla. Nullam efficitur auctor mi blandit malesuada.&lt;/p&gt;",
         "type": null,
         "phi_days": 14,
         "image": "7b77642dc98e2122194b26a21dd2c614.jpeg",
         "pests_disease_weed": [
             {
                 "id": 484,
                 "name": "Mmaximus",
                 "type": "Weed",
                 "scientific_name": null,
                 "description_pest": "&lt;p&gt;Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.&lt;/p&gt;",
                 "description_impact": "&lt;p&gt;&lt;strong&gt;Sed elementum&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.&lt;/p&gt;",
                 "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
                 "references": "&lt;ol&gt;&lt;li&gt;&lt;a href=\"https://www.upsim.org/lonet\"&gt;"
             },
             .
             .
             .
         ],
   }
}</code></pre>
<blockquote>
<p>Example response (404, No Pests, Diseases, Weeds Found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem--id--pdw" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--pdw"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--pdw"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--pdw" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--pdw"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--pdw" data-method="GET" data-path="api/agrochem/{id}/pdw" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--pdw', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/pdw</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--pdw" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Find agrochem based on ID</h2>
<p>Find agrochem product based on given ID.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/et" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/et"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/et'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/et',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
   "data": {
         "id": 1999,
         "product_name": "Morbi fringilla",
         "pcpb_number": "PCPB(CR)9999",
         "distributing_company": "Sed elementum",
         "toxic": 1,
         "who_class": "II",
         "composition": "200g/L as paraquat ion",
         "registrant": "Nam eu erat rhoncus",
         "type": null,
         "phi_days": null,
         "crops": [
             {
                 "id": 1,
                 "name": "Donec",
                 "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
                 "pests_disease_weed": [
                     {
                         "id": 320,
                         "name": "Proin vulputate",
                         "type": "Disease",
                         "scientific_name": "Mauris elementum",
                         "description_pest": "Morbi eget odio tristique, venenatis metus eu, lobortis purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas",
                         "description_impact": "Donec fringilla enim ut convallis faucibus. Ut tempus turpis eget eros iaculis rhoncus. Cras aliquam nulla vitae felis ullamcorper ultrices.",
                         "image": "a53773d8c98ecedd1c2043eb1203c80a.jpg",
                         "references": "https://en.m.lorem.org/wiki"
                     },
                     .
                     .
                     .
                 ],
                 "agrochems": [
                     {
                         "id": 1123,
                         "product_name": "Ut maximus",
                         "pcpb_number": "PCPB(CR)9999",
                         "distributing_company": "Mauris a viv",
                         "who_class": "II",
                         "toxic": 1,
                         "composition": "200g/L as paraquat ion",
                         "registrant": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla",
                         "type": null,
                         "phi_days": null,
                         "image": "90c8cd35feef1fdbdfb6a3fff78567cf.jpg"
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
         "pests_disease_weed": [
             {
                 "id": 484,
                 "name": "Mmaximus",
                 "type": "Weed",
                 "scientific_name": null,
                 "description_pest": "&lt;p&gt;Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.&lt;/p&gt;",
                 "description_impact": "&lt;p&gt;&lt;strong&gt;Sed elementum&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.&lt;/p&gt;",
                 "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
                 "references": "&lt;ol&gt;&lt;li&gt;&lt;a href=\"https://www.upsim.org/lonet\"&gt;"
             },
             .
             .
             .
         ],
         "image": "90c8539cfeef1f2345b6a3fff78567cf.jpg",
         "active_ingredients": [
             {
                 "id": 1,
                 "name": "Proin feugiat",
                 "potential_harm": null,
                 "aquatic": 1.2,
                 "aquatic_desc": "&lt;p&gt;Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.&lt;/p&gt;",
                 "bees": 72,
                 "bees_desc": "&lt;p&gt; Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam&lt;/p&gt;",
                 "earthworm": 999,
                 "earthworm_desc": null,
                 "birds": 35,
                 "birds_desc": "&lt;p&gt;Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.&lt;/p&gt;",
                 "leachability": -6.89,
                 "leachability_desc": "&lt;p&gt;Mauris elementum ac lectus &lt;/p&gt;",
                 "carcinogenicity": "No",
                 "mutagenicity": "No Data",
                 "edc": "No",
                 "reproduction": "Possible",
                 "ache": "No",
                 "neurotoxicant": "No",
                 "who_classification": "II",
                 "eu_approved": "No",
                 "image": "ca211702a9941c4e0f2945750fb63c7e.png",
                 "agrochems": [
                     {
                         "id": 1,
                         "product_name": "Curabitun",
                         "pcpb_number": "PCPB(CR)9029",
                         "distributing_company": "Cras sed neque.",
                         "who_class": "II",
                         "toxic": 1,
                         "composition": "200g/L as paraquat ion",
                         "registrant": "Cras eget feugiat metus. Integer ultricies eu felis et laoreet..",
                         "type": null,
                         "phi_days": null,
                         "image": "90c8e234feef1fdbdfb6a3fff78567cf.jpg"
                     },
                     .
                     .
                     .
                 ]
             },
             .
             .
             .
         ]
   }
}</code></pre>
<blockquote>
<p>Example response (404, Agrochem not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
<div id="execution-results-GETapi-agrochem--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id-"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id-"></code></pre>
</div>
<form id="form-GETapi-agrochem--id-" data-method="GET" data-path="api/agrochem/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id-" data-component="url" required  hidden>
<br>

</p>
</form><h1>Commercial Organic</h1>
<p>Commercial organic requests</p>
<h2>Add commercial organic</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Adds a new commercial organic item to database</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/commercial_organic" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"name":"delectus","pcpb_number":{},"manufacturer":{},"distributor":{},"category":{},"contact_details":{},"image":{},"external_links":{},"application_details":{},"pests_diseases_weeds":{}}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/commercial_organic',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'delectus',
            'pcpb_number' =&gt; [],
            'manufacturer' =&gt; [],
            'distributor' =&gt; [],
            'category' =&gt; [],
            'contact_details' =&gt; [],
            'image' =&gt; [],
            'external_links' =&gt; [],
            'application_details' =&gt; [],
            'pests_diseases_weeds' =&gt; [],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
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
}</code></pre>
<blockquote>
<p>Example response (501, Active ingredient not created):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 501,
    "message": "Not Created",
    "success": false
}</code></pre>
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
<h2>Update commercial organic</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Updates the commercial organic item based on the ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8000/api/commercial_organic/aut" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"name":"voluptate","pcpb_number":{},"manufacturer":{},"distributor":{},"category":{},"contact_details":{},"image":{},"external_links":{},"application_details":{},"pests_diseases_weeds":{}}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/commercial_organic/aut',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'voluptate',
            'pcpb_number' =&gt; [],
            'manufacturer' =&gt; [],
            'distributor' =&gt; [],
            'category' =&gt; [],
            'contact_details' =&gt; [],
            'image' =&gt; [],
            'external_links' =&gt; [],
            'application_details' =&gt; [],
            'pests_diseases_weeds' =&gt; [],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (501, Update failed):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 501,
    "message": "Update Unsuccessful",
    "success": false
}</code></pre>
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
<h2>Delete commercial organic</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Deletes a commercial organic item based on the id value</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8000/api/commercial_organic/molestiae" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/molestiae'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/commercial_organic/molestiae',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 200,
    "message": "Deleted",
    "success": true,
    "data": null
}</code></pre>
<blockquote>
<p>Example response (501, Delete failed):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 501,
    "message": "Item not found",
    "success": false
}</code></pre>
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
<h2>Get all commercial organic items</h2>
<p>Retrieve all commercial organic items</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic?order_column=tenetur&amp;order_direction=recusandae&amp;per_page=nemo" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commercial_organic"
);

let params = {
    "order_column": "tenetur",
    "order_direction": "recusandae",
    "per_page": "nemo",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'order_column'=&gt; 'tenetur',
            'order_direction'=&gt; 'recusandae',
            'per_page'=&gt; 'nemo',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
     "data": [
         {
             "id": 422,
             "name": "Vivamus",
             "pcpb_number": "PCPB(CR)3999",
             "manufacturer": "Donec suscipit",
             "distributor": "Donec suscipit",
             "category": "Biocontrol",
             "contact_details": "&lt;p&gt;P.O.Box 23423423&lt;/p&gt;&lt;p&gt;Nairobi 2234234 Kenya&lt;/p&gt;&lt;p&gt;Cell: +254 234 564 122&lt;/p&gt;",
             "external_links": [
                 "&lt;p&gt;www.suscipit.com&lt;/p&gt;",
                 "&lt;p&gt;https://www.suscipit.com/shop/Vivamus/&lt;/p&gt;"
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
}</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
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
<h2>Search commercial organic</h2>
<p>Performs search on commercial organic records based on query parameter values<br>
Query parameter keys are the columns</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/filter/id?per_page=1&amp;order_direction=desc&amp;order_column=id&amp;pcpb_number=ipsa&amp;manufacturer=ea&amp;distributor=deserunt&amp;category=non&amp;contact_details=quia&amp;external_links=sint&amp;application_details=quisquam" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
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
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/filter/id',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'per_page'=&gt; '1',
            'order_direction'=&gt; 'desc',
            'order_column'=&gt; 'id',
            'pcpb_number'=&gt; 'ipsa',
            'manufacturer'=&gt; 'ea',
            'distributor'=&gt; 'deserunt',
            'category'=&gt; 'non',
            'contact_details'=&gt; 'quia',
            'external_links'=&gt; 'sint',
            'application_details'=&gt; 'quisquam',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
     "data": [
         {
             "id": 911,
             "name": "Sed viverra",
             "pcpb_number": "PCPB(CR)9999",
             "manufacturer": "Vivamus diam ligula",
             "distributor": "Vivamus diam ligula",
             "category": "Biocontrol",
             "contact_details": "&lt;h3&gt;Vivamus diam ligulah3&gt;&lt;p&gt;House , 5th Floor&lt;/p&gt;&lt;/p&gt;",
             "external_links": [
                 "&lt;p&gt;&lt;a href=\"http://www.vivamusdiamligula.com/sed_viverra/\"&gt;http://www.vivamusdiamligula.com/sed_viverra/&lt;/a&gt;&lt;/p&gt;"
             ],
             "application_details": [
                 "&lt;p&gt;Quisque eu nunc volutpat, sodales arcu quis, varius metus. Nulla vitae laoreet felis. Duis finibus faucibus eros, at gravida enim porta ut&lt;/p&gt;"
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
}</code></pre>
<blockquote>
<p>Example response (404, Items not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Items not found",
    "success": false
}</code></pre>
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
<h2>Implementation for Datatables API to populate table with commercial organic records</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/datatable" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/datatable'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/datatable',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
            "contact_details": "&lt;p&gt;Old Airport North Road, Nairobi, Kenya&lt;\/p&gt;&lt;p&gt;pr@amirankenya.com&lt;\/p&gt;&lt;p&gt;+254 719 095000,&lt;\/p&gt;&lt;p&gt;0800720720&lt;\/p&gt;",
            "external_links": [
                "&lt;p&gt;&lt;a href=\"https:\/\/www.baltoncp.com\/amirankenya\/agribusiness\/chemicals\/\"&gt;https:\/\/www.baltoncp.com\/amirankenya\/agribusiness\/chemicals\/&lt;\/a&gt;&lt;\/p&gt;"
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
            "contact_details": "&lt;h3&gt;Arysta LifeScience (K) Ltd ,&lt;\/h3&gt;&lt;p&gt;Tulip House , 5th Floor Mombasa Road .&lt;\/p&gt;&lt;p&gt;P.O Box 30335,00100&lt;\/p&gt;&lt;p&gt;Nairobi , Kenya&lt;\/p&gt;&lt;p&gt;Tel: +254717432174&lt;\/p&gt;&lt;p&gt;&lt;a href=\"mailto:arysta.kenya@arysta.com\"&gt;arysta.kenya@arysta.com&lt;\/a&gt;&lt;\/p&gt;",
            "external_links": [
                "&lt;p&gt;&lt;a href=\"http:\/\/www.arystalifescience.co.ke\/product_categories\/insecticides\/?product_id=1755\"&gt;http:\/\/www.arystalifescience.co.ke\/product_categories\/insecticides\/?product_id=1755&lt;\/a&gt;&lt;\/p&gt;"
            ],
            "application_details": [
                "&lt;p&gt;&lt;strong&gt;Directions for use:&lt;\/strong&gt; Apply as soons as early instar larvae are noticed&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Dosage:&lt;\/strong&gt; 0.25 kgs for Cabbage and 0.5kgs for Coffee (5-10g in 20 litres of water )&lt;\/p&gt;"
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
                "&lt;p&gt;&lt;a href=\"https:\/\/www.twigachemicals.com\/wp-content\/uploads\/2017\/05\/curanox-label.pdf\"&gt;https:\/\/www.twigachemicals.com\/wp-content\/uploads\/2017\/05\/curanox-label.pdf&lt;\/a&gt;&lt;\/p&gt;"
            ],
            "application_details": [
                "&lt;p&gt;&lt;strong&gt;CURENOX 50 WP GENERAL INFORMATION&lt;\/strong&gt;&lt;\/p&gt;&lt;p&gt;A broad spectrum green copper based wettable powder fungicide for the preventative&lt;\/p&gt;&lt;p&gt;control of early and late blight in tomato, coffee leaf rust and coffee berry disease in&lt;\/p&gt;&lt;p&gt;coffee.&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Mode of action&lt;\/strong&gt;&lt;\/p&gt;&lt;p&gt;Copper ions are absorbed by fungal and bacterial spores as they grow. Once&lt;\/p&gt;&lt;p&gt;absorbed, copper disrupts the enzyme systems of the pathogenic organisms. It is a&lt;\/p&gt;&lt;p&gt;protectant fungicide therefore it must be deposited on the crop before the fungal&lt;\/p&gt;&lt;p&gt;spores begin to germinate.&amp;nbsp;&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Re-Entry&amp;nbsp;Period&amp;nbsp;:&amp;nbsp;&lt;\/strong&gt;12hrs&amp;nbsp;or&amp;nbsp;after&amp;nbsp;spray&amp;nbsp;has&amp;nbsp;dried&amp;nbsp;on&amp;nbsp;the&amp;nbsp;leaves&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Note:&amp;nbsp;&lt;\/strong&gt;Apply&amp;nbsp;prior&amp;nbsp;to&amp;nbsp;disease&amp;nbsp;appearance&amp;nbsp;and&amp;nbsp;follow&amp;nbsp;recommended &amp;nbsp;spray&amp;nbsp;intervals.&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Preparation&amp;nbsp;of&amp;nbsp;the&amp;nbsp;spray&lt;\/strong&gt;&lt;\/p&gt;&lt;p&gt;Mixthe&amp;nbsp;required&amp;nbsp; quantity&amp;nbsp;of&amp;nbsp;&lt;strong&gt;CURENOX &amp;nbsp;50WP&amp;nbsp; &amp;nbsp;&lt;\/strong&gt;in&amp;nbsp;one&amp;nbsp;third&amp;nbsp;(1\/3)&amp;nbsp;of&amp;nbsp;the&amp;nbsp;necessary&amp;nbsp;amount &amp;nbsp;of&amp;nbsp;water &amp;nbsp;while&amp;nbsp; constantly &amp;nbsp;agitating. &amp;nbsp;Mix&amp;nbsp;into&amp;nbsp;a&amp;nbsp;slurry &amp;nbsp;and&amp;nbsp;top&amp;nbsp;up&amp;nbsp;with&amp;nbsp;the&amp;nbsp;remainingamount&amp;nbsp;of water,&amp;nbsp;while&amp;nbsp;constantly&amp;nbsp;agitating.&amp;nbsp;Even&amp;nbsp;while&amp;nbsp;spraying&amp;nbsp;constant&amp;nbsp;agitation&amp;nbsp;is&amp;nbsp;necessary.&amp;nbsp; Spray&amp;nbsp;to&amp;nbsp;give&amp;nbsp;an&amp;nbsp;even&amp;nbsp;coverage.Use&amp;nbsp;the&amp;nbsp;spray&amp;nbsp;on&amp;nbsp;the&amp;nbsp;same&amp;nbsp;day&amp;nbsp;of&amp;nbsp;its&amp;nbsp;preparation.&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;HAZARDS&amp;nbsp;\/PRECAUTIONS&lt;\/strong&gt;&lt;\/p&gt;&lt;p&gt;Thisproduct&amp;nbsp;is&amp;nbsp;harmful&amp;nbsp;if inhaled&amp;nbsp;or&amp;nbsp;swallowed.&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Handling: &amp;nbsp;&lt;\/strong&gt;Wearprotective &amp;nbsp;clothing &amp;nbsp;namely; &amp;nbsp;overalls, &amp;nbsp;gloves,&amp;nbsp; gum&amp;nbsp;boots,hat\/head&amp;nbsp;dress&amp;nbsp;or dust&amp;nbsp;mask&amp;nbsp;when&amp;nbsp;preparing&amp;nbsp;the&amp;nbsp;spray&amp;nbsp;mixture&amp;nbsp;and&amp;nbsp;face&amp;nbsp;shield&amp;nbsp;while&amp;nbsp;spraying.&amp;nbsp;Avoid&amp;nbsp;breathing &amp;nbsp;in&amp;nbsp;dust.&amp;nbsp;Avoid&amp;nbsp; contact &amp;nbsp;with&amp;nbsp;skin,&amp;nbsp;eyes&amp;nbsp;and&amp;nbsp;clothing. &amp;nbsp;Do&amp;nbsp;not&amp;nbsp;apply&amp;nbsp;upwind&amp;nbsp;and&amp;nbsp;stay&amp;nbsp;out&amp;nbsp;of the&amp;nbsp;spray&amp;nbsp;mist.&amp;nbsp;Do&amp;nbsp;not&amp;nbsp;smoke,&amp;nbsp;drink&amp;nbsp;or eatwhile&amp;nbsp;handling&amp;nbsp;the product.&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;After&amp;nbsp;work:&amp;nbsp;&lt;\/strong&gt;Change&amp;nbsp;clothes&amp;nbsp;and thoroughly&amp;nbsp;wash&amp;nbsp;hands&amp;nbsp;and face.&amp;nbsp;Carefully&amp;nbsp;wash&amp;nbsp;the&amp;nbsp;spraying&amp;nbsp;equipment&amp;nbsp;and&amp;nbsp;working&amp;nbsp;clothes.&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;STORAGE:&amp;nbsp;&lt;\/strong&gt;Curenox&amp;nbsp;50WP&amp;nbsp;must&amp;nbsp;be kept&amp;nbsp;in&amp;nbsp;its original,&amp;nbsp;sealed&amp;nbsp;containerin&amp;nbsp;a&amp;nbsp;cool,&amp;nbsp;dry&amp;nbsp;and&amp;nbsp;well&amp;nbsp;ventilated&amp;nbsp;place&amp;nbsp;under&amp;nbsp;lock&amp;nbsp;and&amp;nbsp;key away&amp;nbsp;from&amp;nbsp;food&amp;nbsp;stuffs,&amp;nbsp;beverages,&amp;nbsp;animal&amp;nbsp;feed&amp;nbsp;and&amp;nbsp;packaging &amp;nbsp;materials &amp;nbsp;used&amp;nbsp; for&amp;nbsp;these &amp;nbsp;commodities. &amp;nbsp;Store &amp;nbsp;out&amp;nbsp;of&amp;nbsp;reach &amp;nbsp;of&amp;nbsp;childrenand&amp;nbsp;unauthorized&amp;nbsp;people.&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;DISPOSAL:&amp;nbsp; &lt;\/strong&gt;Surplus&amp;nbsp;product,&amp;nbsp;if&amp;nbsp;unused&amp;nbsp;should&amp;nbsp;be&amp;nbsp;disposed&amp;nbsp;off&amp;nbsp;accordingto&amp;nbsp;national&amp;nbsp;regulations &amp;nbsp;on&amp;nbsp;chemicaldisposal&amp;nbsp;on&amp;nbsp;a&amp;nbsp;landfillsite&amp;nbsp;approved&amp;nbsp; for&amp;nbsp;pesticides &amp;nbsp;in&amp;nbsp;a&amp;nbsp;safe&amp;nbsp;place&amp;nbsp;away&amp;nbsp;from&amp;nbsp;water&amp;nbsp;sources. &amp;nbsp;Do&amp;nbsp;not&amp;nbsp;use&amp;nbsp;empty&amp;nbsp;containerfor any&amp;nbsp;other&amp;nbsp;purpose.&amp;nbsp;Empty&amp;nbsp;containers&amp;nbsp;are&amp;nbsp;to&amp;nbsp;be&amp;nbsp;triple&amp;nbsp;rinsed,&amp;nbsp;flattened,&amp;nbsp;perforated&amp;nbsp;and&amp;nbsp;disposed&amp;nbsp;off&amp;nbsp;on&amp;nbsp;a&amp;nbsp;landfill &amp;nbsp;site&amp;nbsp;in&amp;nbsp;a&amp;nbsp;safe&amp;nbsp;place&amp;nbsp; away&amp;nbsp; from&amp;nbsp;water &amp;nbsp;sources &amp;nbsp;in&amp;nbsp;accordance &amp;nbsp;with&amp;nbsp;national&amp;nbsp;regulations&amp;nbsp;on&amp;nbsp;chemical&amp;nbsp;disposal.&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;ENVIRONMENT&lt;\/strong&gt;&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;CURENOX &amp;nbsp;50WP&amp;nbsp;&lt;\/strong&gt;is&amp;nbsp;very&amp;nbsp;toxic&amp;nbsp;to&amp;nbsp;aquatic&amp;nbsp;life.&amp;nbsp;It&amp;nbsp;is&amp;nbsp;hazardous &amp;nbsp;to&amp;nbsp;domestic&amp;nbsp;animals.&amp;nbsp;Livestockshould&amp;nbsp;not&amp;nbsp;be&amp;nbsp;allowed&amp;nbsp;to&amp;nbsp;feed&amp;nbsp;on&amp;nbsp;newly&amp;nbsp;sprayed&amp;nbsp;herbage.&amp;nbsp;Do&amp;nbsp;not&amp;nbsp;contami-&amp;nbsp;nate&amp;nbsp;ponds&amp;nbsp;or&amp;nbsp;waterways &amp;nbsp;by&amp;nbsp;direct&amp;nbsp;application, &amp;nbsp;cleaning&amp;nbsp; of&amp;nbsp;equipment, &amp;nbsp;disposal&amp;nbsp; of&amp;nbsp;waste&amp;nbsp;and&amp;nbsp;empty&amp;nbsp;paper&amp;nbsp;pack.&lt;\/p&gt;"
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
            "contact_details": "&lt;h3&gt;Arysta LifeScience (K) Ltd ,&lt;\/h3&gt;&lt;p&gt;Tulip House , 5th Floor Mombasa Road .&lt;\/p&gt;&lt;p&gt;P.O Box 30335,00100&lt;\/p&gt;&lt;p&gt;Nairobi , Kenya&lt;\/p&gt;&lt;p&gt;Tel: +254717432174&lt;\/p&gt;&lt;p&gt;&lt;a href=\"mailto:arysta.kenya@arysta.com\"&gt;arysta.kenya@arysta.com&lt;\/a&gt;&lt;\/p&gt;",
            "external_links": [],
            "application_details": [
                "&lt;p&gt;&lt;strong&gt;Composition:&lt;\/strong&gt; 37.5% W\/W Copper Oxychloride (Metallic copper)&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Formulation:&lt;\/strong&gt; Wettable dispersible Granule (WG)&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Crop:&lt;\/strong&gt; Coffee, Potatoes, Tomatoes &amp;amp; French Beans&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Spectrum:&lt;\/strong&gt; Coffee Leaf Rust, Coffee Berry Disease, Early &amp;amp; late blight&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Hazard classification:&lt;\/strong&gt; Class III (slightly hazardous)&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Packaging:&lt;\/strong&gt; 500 g, 1 kg &amp;amp; 2 kg&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;figure class=\"table\"&gt;&lt;table&gt;&lt;thead&gt;&lt;tr&gt;&lt;th&gt;&lt;strong&gt;Crop&lt;\/strong&gt;&lt;\/th&gt;&lt;th&gt;&lt;strong&gt;Disease&lt;\/strong&gt;&lt;\/th&gt;&lt;th&gt;&lt;strong&gt;Dosage&lt;\/strong&gt;&lt;\/th&gt;&lt;th&gt;&lt;strong&gt;Knapsack rate Spray interval&lt;\/strong&gt;&lt;\/th&gt;&lt;th&gt;&lt;strong&gt;Pre-harvest&amp;nbsp;&lt;\/strong&gt;&lt;br&gt;&lt;strong&gt;Interval (PHI)&lt;\/strong&gt;&lt;\/th&gt;&lt;\/tr&gt;&lt;\/thead&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td rowspan=\"2\"&gt;&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;\/strong&gt;&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Coffee&lt;\/strong&gt;&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;Coffee Leaf&lt;br&gt;Rust&lt;\/td&gt;&lt;td&gt;3.8 kg\/ha in 1100 L of water&lt;\/td&gt;&lt;td&gt;70 g\/ 20 L Knapsack&lt;br&gt;50 g\/5 L Knapsack&lt;br&gt;Spray at 3 weeks interval.&lt;\/td&gt;&lt;td&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;14 days&lt;\/p&gt;&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;Coffee Berry&lt;br&gt;Disease&lt;\/td&gt;&lt;td&gt;7.0 kg\/ha in 1000 L of water&lt;\/td&gt;&lt;td&gt;130 g\/20 L Knapsack&lt;br&gt;100 g\/15 L Knapsack&lt;br&gt;Spray at 4 weeks interval.&lt;\/td&gt;&lt;td&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;14 days&lt;\/p&gt;&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;strong&gt;Potatoes&lt;\/strong&gt;&lt;\/td&gt;&lt;td&gt;Late blight&lt;\/td&gt;&lt;td rowspan=\"3\"&gt;2.7 kg\/ha in 1000 L of water&lt;\/td&gt;&lt;td rowspan=\"3\"&gt;54g\/20 L Knapsack. 40g\/15 L Knapsack&lt;br&gt;Spray at 7-10 days&lt;br&gt;interval when plants are six inches high until&lt;br&gt;harvest.&lt;\/td&gt;&lt;td&gt;3 days&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;strong&gt;Tomatoes&lt;\/strong&gt;&lt;\/td&gt;&lt;td&gt;Early &amp;amp; late blight&lt;\/td&gt;&lt;td&gt;3 days&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;strong&gt;French&lt;\/strong&gt;&lt;br&gt;&lt;strong&gt;Beans&lt;\/strong&gt;&lt;\/td&gt;&lt;td&gt;Anthracnose,&lt;br&gt;Sclerotinia,&lt;br&gt;Angular leaf spot, Rust&lt;\/td&gt;&lt;td&gt;3 days&lt;\/td&gt;&lt;\/tr&gt;&lt;\/tbody&gt;&lt;\/table&gt;&lt;\/figure&gt;"
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
            "contact_details": "&lt;p&gt;Kijani Agencies Ltd., P.O. Box 13980, 00800 Nairobi.&lt;\/p&gt;",
            "external_links": [],
            "application_details": [
                "&lt;p&gt;A preventive fungicide for control of Coffee Berry Disease (CBD) and Coffee leaf Rust in&lt;\/p&gt;&lt;p&gt;coffee. It’s the finest green copper used in coffee industry with an optimum particle size&lt;\/p&gt;&lt;p&gt;which ensures good coverage and uptake of copper ions by the fungus causing CBD and Leaf&lt;\/p&gt;&lt;p&gt;rust. Packs 25kg, 2kg and 1kg.&lt;\/p&gt;&lt;p&gt;&lt;strong&gt;Fact Sheet:&lt;\/strong&gt;&lt;\/p&gt;&lt;p&gt;Preventive fungicides which must be applied before the disease symptoms appear and&lt;\/p&gt;&lt;p&gt;repeated at interval of 3-4 weeks at the susceptible coffee berry development stages&lt;\/p&gt;&lt;p&gt;(expansion- hardening)&lt;\/p&gt;&lt;p&gt;Active Ingredient- Copper Oxychloride (50% metallic copper)&lt;\/p&gt;&lt;p&gt;Formulation- Wettable powder&lt;\/p&gt;&lt;p&gt;Rate of application- 70gms+45gms Rova 75% WP in 20l of water&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;RESTRAINTS:&lt;\/p&gt;&lt;p&gt;• DO NOT apply this product when hot conditions (35°C) or frosts are likely to occur as damage can result.&lt;\/p&gt;&lt;p&gt;• DO NOT apply to copper shy varieties&lt;\/p&gt;&lt;p&gt;• DO NOT apply to wet foliage&lt;\/p&gt;&lt;p&gt;• DO NOT use this product during poor drying conditions&lt;\/p&gt;"
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
                "&lt;figure class=\"table\"&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;p&gt;DISEASE&amp;nbsp;CONTROLLED&lt;\/p&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;COFFEE&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;RATE&lt;\/td&gt;&lt;td&gt;APPLICATION INFORMATION&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;p&gt;Coffee&amp;nbsp;Berry&amp;nbsp;Disease&amp;nbsp;(CDB)&lt;\/p&gt;&lt;p&gt;Colletotrichum&amp;nbsp;kahawae&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;&lt;p&gt;140&amp;nbsp;gms&amp;nbsp;in&amp;nbsp;20L&amp;nbsp;of&amp;nbsp;water&lt;\/p&gt;&lt;p&gt;105&amp;nbsp;gms&amp;nbsp;in&amp;nbsp;15L&amp;nbsp;of&amp;nbsp;water&lt;\/p&gt;&lt;p&gt;7.7 &amp;nbsp;kg &amp;nbsp;\/&amp;nbsp;hectare&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;Start&amp;nbsp;spraying&amp;nbsp;at&amp;nbsp;the&amp;nbsp;onset&amp;nbsp;of rains&amp;nbsp;and&amp;nbsp;repeat&amp;nbsp;every&amp;nbsp;21&amp;nbsp;days&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;Coffee&amp;nbsp;Leaf&amp;nbsp;Rust&lt;\/td&gt;&lt;td&gt;70&amp;nbsp;gms&amp;nbsp;in&amp;nbsp;20L&amp;nbsp;of&amp;nbsp;water&lt;\/td&gt;&lt;td&gt;in&amp;nbsp;combination&amp;nbsp;with&amp;nbsp;an&amp;nbsp;approvedorganic&amp;nbsp;fungicide&amp;nbsp;at&amp;nbsp;the&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;(Hemileia&amp;nbsp;vastatrix)&lt;\/td&gt;&lt;td&gt;52.5&amp;nbsp;gms&amp;nbsp;in&amp;nbsp;15L&amp;nbsp;of&amp;nbsp;water&lt;\/td&gt;&lt;td&gt;recommended&amp;nbsp;rates&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;3.5-5.0&amp;nbsp;kg &amp;nbsp;\/&amp;nbsp;hectare&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;FRENCH&amp;nbsp;BEANS&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;Anthracnose&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;2&amp;nbsp;kg\/ha&lt;\/td&gt;&lt;td&gt;Spray volume&amp;nbsp;of&amp;nbsp;1000 &amp;nbsp;L&amp;nbsp;per&amp;nbsp;hectare&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;Angular&amp;nbsp;leaf&amp;nbsp;spot&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;Sclerotinia&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;Apply&amp;nbsp;on&amp;nbsp;a&amp;nbsp;preventive&amp;nbsp;programme&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;ROSE&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;Botrytis&lt;\/td&gt;&lt;td&gt;2&amp;nbsp;kg\/ha&lt;\/td&gt;&lt;td&gt;Spray&amp;nbsp;volume of1000&amp;nbsp;L&amp;nbsp;per&amp;nbsp;hectare&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;Black&amp;nbsp;spots&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;Apply&amp;nbsp;as&amp;nbsp;soon&amp;nbsp;as&amp;nbsp;the&amp;nbsp;ﬁrst&amp;nbsp;signs&amp;nbsp;of&amp;nbsp;the&amp;nbsp;diseasesappear&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;and&amp;nbsp;repeatafter&amp;nbsp;7&amp;nbsp;days&amp;nbsp;until &amp;nbsp;the&amp;nbsp;disease&amp;nbsp;pressure&amp;nbsp;drop&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;below the&amp;nbsp;economic&amp;nbsp;threshold&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;TOMATO&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;Late blight&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;1&amp;nbsp;kg\/ha&lt;\/p&gt;&lt;\/td&gt;&lt;td&gt;Spray volume&amp;nbsp;of&amp;nbsp;1000 &amp;nbsp;L&amp;nbsp;per&amp;nbsp;hectare&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;(Phytophthora infestans)&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;&lt;p&gt;&amp;nbsp;&lt;\/p&gt;&lt;p&gt;Start&amp;nbsp;spraying&amp;nbsp;at&amp;nbsp;the&amp;nbsp;first&amp;nbsp;signs&amp;nbsp;of&amp;nbsp;late&amp;nbsp;blightor&amp;nbsp;when&lt;\/p&gt;&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;the&amp;nbsp;prevailing&amp;nbsp;weather&amp;nbsp;is&amp;nbsp;conducive&amp;nbsp;for &amp;nbsp;late&amp;nbsp;blight&lt;\/td&gt;&lt;\/tr&gt;&lt;tr&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;&amp;nbsp;&lt;\/td&gt;&lt;td&gt;manifestation.&lt;\/td&gt;&lt;\/tr&gt;&lt;\/tbody&gt;&lt;\/table&gt;&lt;\/figure&gt;"
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
}</code></pre>
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
<h2>api/commercial_organic/names</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/names" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/names'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/names',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
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
<h2>Performs search on commercial organic records based on query parameter values</h2>
<p>Returns only name, id and image
Query parameter keys are the columns</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/summary/names/qui" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/summary/names/qui'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/summary/names/qui',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
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
<h2>api/commercial_organic/summary/count/control_methods</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/summary/count/control_methods" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/summary/count/control_methods'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/summary/count/control_methods',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "total": 45
}</code></pre>
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
<h2>api/commercial_organic/summary/count/pdw</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/summary/count/pdw" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/summary/count/pdw'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/summary/count/pdw',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "total": 74
}</code></pre>
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
<h2>Performs aggregations on commercial organic records based on query parameter values</h2>
<p>Returns total
Query parameter keys are the columns</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/summary/count/et" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/summary/count/et'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/summary/count/et',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "total": 12
}</code></pre>
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
<h2>api/commercial_organic/{id}/agrochem</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/omnis/agrochem" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/omnis/agrochem'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/omnis/agrochem',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
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
<h2>api/commercial_organic/{id}/control_methods</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/fuga/control_methods" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/fuga/control_methods'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/fuga/control_methods',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
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
<h2>api/commercial_organic/{id}/gap</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/veritatis/gap" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/veritatis/gap'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/veritatis/gap',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
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
<h2>api/commercial_organic/{id}/homemade_organic</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/pariatur/homemade_organic" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/pariatur/homemade_organic'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/pariatur/homemade_organic',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
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
<h2>api/commercial_organic/{id}/pdw</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/hic/pdw" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/hic/pdw'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/hic/pdw',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
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
<h2>Find commercial organic item based on given ID.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/non" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/non'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/non',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 911,
        "name": "Sed viverra",
        "pcpb_number": "PCPB(CR)9999",
        "manufacturer": "Vivamus diam ligula",
        "distributor": "Vivamus diam ligula",
        "category": "Biocontrol",
        "contact_details": "&lt;h3&gt;Vivamus diam ligulah3&gt;&lt;p&gt;House , 5th Floor&lt;\/p&gt;&lt;\/p&gt;",
        "external_links": [
            "&lt;p&gt;&lt;a href=\"http:\/\/www.vivamusdiamligula.com\/sed_viverra\/\"&gt;http:\/\/www.vivamusdiamligula.com\/sed_viverra\/&lt;\/a&gt;&lt;\/p&gt;"
        ],
        "application_details": [
            "&lt;p&gt;Quisque eu nunc volutpat, sodales arcu quis, varius metus. Nulla vitae laoreet felis. Duis finibus faucibus eros, at gravida enim porta ut&lt;\/p&gt;"
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
}</code></pre>
<blockquote>
<p>Example response (404, Item not found):</p>
</blockquote>
<pre><code class="language-json">{
    "code": 404,
    "message": "Item not found",
    "success": false
}</code></pre>
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
</form><h1>Endpoints</h1>
<h2>api/active_ingredients/{id}/image</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/active_ingredients/velit/image" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/velit/image"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/velit/image'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/active_ingredients/velit/image',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-active_ingredients--id--image" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-active_ingredients--id--image"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-active_ingredients--id--image"></code></pre>
</div>
<div id="execution-error-POSTapi-active_ingredients--id--image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-active_ingredients--id--image"></code></pre>
</div>
<form id="form-POSTapi-active_ingredients--id--image" data-method="POST" data-path="api/active_ingredients/{id}/image" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-active_ingredients--id--image', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/active_ingredients/{id}/image</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-active_ingredients--id--image" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/agrochem/{id}/image</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/agrochem/ut/image" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/ut/image"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/ut/image'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/agrochem/ut/image',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-agrochem--id--image" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-agrochem--id--image"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agrochem--id--image"></code></pre>
</div>
<div id="execution-error-POSTapi-agrochem--id--image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agrochem--id--image"></code></pre>
</div>
<form id="form-POSTapi-agrochem--id--image" data-method="POST" data-path="api/agrochem/{id}/image" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-agrochem--id--image', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/agrochem/{id}/image</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-agrochem--id--image" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/commercial_organic/{id}/image</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8000/api/commercial_organic/dolorem/image" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commercial_organic/dolorem/image"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/dolorem/image'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/commercial_organic/dolorem/image',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<div id="execution-results-POSTapi-commercial_organic--id--image" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-commercial_organic--id--image"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-commercial_organic--id--image"></code></pre>
</div>
<div id="execution-error-POSTapi-commercial_organic--id--image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-commercial_organic--id--image"></code></pre>
</div>
<form id="form-POSTapi-commercial_organic--id--image" data-method="POST" data-path="api/commercial_organic/{id}/image" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-commercial_organic--id--image', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/commercial_organic/{id}/image</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-commercial_organic--id--image" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/active_ingredients/search/{value?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/search/minima" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/active_ingredients/search/minima"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/active_ingredients/search/minima'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/active_ingredients/search/minima',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<div id="execution-results-GETapi-active_ingredients-search--value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-search--value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-search--value--"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-search--value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-search--value--"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-search--value--" data-method="GET" data-path="api/active_ingredients/search/{value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-search--value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/search/{value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="value" data-endpoint="GETapi-active_ingredients-search--value--" data-component="url"  hidden>
<br>

</p>
</form>
<h2>api/agrochem/search/{value?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/agrochem/search/ex" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/agrochem/search/ex"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/agrochem/search/ex'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/agrochem/search/ex',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<div id="execution-results-GETapi-agrochem-search--value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-search--value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-search--value--"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-search--value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-search--value--"></code></pre>
</div>
<form id="form-GETapi-agrochem-search--value--" data-method="GET" data-path="api/agrochem/search/{value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-search--value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/search/{value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="value" data-endpoint="GETapi-agrochem-search--value--" data-component="url"  hidden>
<br>

</p>
</form>
<h2>api/commercial_organic/search/{value?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/search/velit" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/commercial_organic/search/velit"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/commercial_organic/search/velit'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/commercial_organic/search/velit',
    [
        'headers' =&gt; [
            'Access-Control-Allow-Origin' =&gt; '*',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<div id="execution-results-GETapi-commercial_organic-search--value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic-search--value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic-search--value--"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic-search--value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic-search--value--"></code></pre>
</div>
<form id="form-GETapi-commercial_organic-search--value--" data-method="GET" data-path="api/commercial_organic/search/{value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic-search--value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/search/{value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="value" data-endpoint="GETapi-commercial_organic-search--value--" data-component="url"  hidden>
<br>

</p>
</form>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                                    <a href="#" data-language-name="python">python</a>
                                    <a href="#" data-language-name="php">php</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript","python","php"];
        setupLanguages(languages);
    });
</script>
</body>
</html>