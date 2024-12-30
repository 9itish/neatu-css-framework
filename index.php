<?php

function generateRandomPlaceholderUrl($text = '', $def_width = false)
{
    // Define minimum and maximum dimensions (multiples of 10)
    $minDim = 300;
    $maxDim = 1000;

    if ($def_width == false) {
        do { // Generate random dimensions rounded to nearest multiple of 10
            $width = rand($minDim, $maxDim) - rand(0, 9);  // Subtract a random value between 0-9 for rounding
            $width = round($width / 10) * 10;
        } while ($width < 400);
    } else {
        $width = 480;
    }

    // do {
    //     $height = rand($minDim, $maxDim) - rand(0, 9);
    //     $height = round($height / 10) * 10;
    // } while(($width/$height) > 1.5 || ($width/$height) < 0.75);

    $height = $width;

    // Generate a random background color (hex format) but a bit darker
    $characters = 'ABCDEF';  // Exclude 0,1 for darker colors
    $color = '';
    for ($i = 0; $i < 6; $i++) {
        $color .= $characters[rand(0, strlen($characters) - 1)];
    }

    if ($text == '') {
        $text = "{$width} × {$height}";
    }
    // Build the URL with random values
    $url = "https://placehold.co/{$width}x{$height}/{$color}/000/?text={$text}";

    return $url;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeatU — Hello Nitish</title>
    <link rel="stylesheet" href="css/neatu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: "Ubuntu";
            font-size: 1.2rem;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        div.result {
            margin: 1rem 0 2rem 0;
            padding: 1rem;
        }

        div.result ul {
            margin: 0;
        }

        pre+p {
            margin-top: 2rem;
        }

        div.n-flex {
            padding: 0.2rem;
            margin: 1rem 0;
        }

        div.n-flex.no-border {
            border: none;
        }

        div.form-group div.n-flex {
            border: none;
            padding: 0;
            margin: 0;
        }

        div.n-flex.grid-example {
            border: 1px solid #666;
        }

        div.n-flex.grid-example>div {
            background: #ccc;
            min-height: 70px;
            background-clip: content-box;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid white;
            font-size: 1.7rem;
            margin: 0;
        }

        /* div.n-flex.gapped > div:first-child {
            padding-left: 0;
        } */

        div.n-flex.no-border>div {
            background: white;
        }

        div.n-flex>figure {
            margin: 1rem;
        }

        div.n-flex.grid-example>div.n-flex.grid-example {
            margin: 0;
            background: white;
            border: 1px solid black;
        }

        .n-btn {
            margin: 0.2rem;
        }

        .vrt-group {
            max-width: 420px;
        }

        .vrt-group>.n-btn {
            margin: 0rem;
        }

        .vrt-group li h3,
        .vrt-group li p {
            margin: 0;
        }

        .color-table,
        .color-table td,
        .color-table th {
            border: 4px solid white;
        }

        .color-table {
            margin: 0;
        }

    </style>
</head>

<body class="wrapper">

    <h1>NeatU CSS Framework</h1>

    <p>A lightweight mobile-first CSS framework for you to quickly create responsive websites that look great everywhere.</p>

    <p>NeatU aims to make it possible for you to create awesome websites with as little HTML bloat as possible.</p>

    <h2>Breakpoints</h2>

    <p>NeatU uses the same breakpoints as Bootstrap. I use the following code in the <b>layout.scss</b> file to manage the breakpoints.</p>

    <pre><code class="lang-css">$viewport-widths: (
    'xs': 440px,
    's': 576px,
    'm': 768px,
    'l': 992px,
    'xl': 1200px,
    'xxl': 1400px
);</code></pre>

    <p>You can update these values to anything else that better fits your requirements.</p>

    <h2>Layout Instructions</h2>

    <p>Add the class <code>n-flex</code> to use CSS flexbox for laying out elements in a container.</p>

    <h3>Equal Width Child Elements (Basic)</h3>

    <p>There are five classes you can use to ensure child elements take up the available space equally at specific viewport widths.</p>

    <p>Add any of the following classes to the <code>n-flex</code> element to make sure all elements have equal width over specific viewport widths.</p>

    <table class="n-full-padding-sw">
        <tr>
            <th>Class</th>
            <th>Equal Width <br> (When Viewport Width)</th>
            <th>Full Width <br> (When Viewport Width)</th>
        </tr>
        <tr>
            <td>n-flex-eq-sw</td>
            <td> >= 576px</td>
            <td>
                < 576px</td>
        </tr>
        <tr>
            <td>n-flex-eq-mw</td>
            <td> >= 768px</td>
            <td>
                < 768px</td>
        </tr>
        <tr>
            <td>n-flex-eq-lw</td>
            <td> >= 992px</td>
            <td>
                < 992px</td>
        </tr>
        <tr>
            <td>n-flex-eq-xlw</td>
            <td> >= 1200px</td>
            <td>
                < 1200px</td>
        </tr>
        <tr>
            <td>n-flex-eq-xxlw</td>
            <td> >= 1400px</td>
            <td>
                < 1400px</td>
        </tr>
    </table>

    <h4>Examples</h4>

    <p>In the following example, all three <code>.n-wrapper</code> elements will have equal width as long as the viewport with is above or equal to 576px. On narrower widths, the <code>.n-wrapper</code> elements will take up full width of the parent.</p>

    <pre><code class="lang-html">&lt;div class="n-flex n-flex-eq-sw grid-example"&gt;
    &lt;div class="n-wrapper"&gt;1&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;2&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;3&lt;/div&gt;
&lt;/div&gt;</code></pre>

    <div class="n-flex grid-example n-flex-eq-sw">
        <div class="n-wrapper">1</div>
        <div class="n-wrapper">2</div>
        <div class="n-wrapper">3</div>
    </div>

    <p>Similarly, using the <code>.n-flex-eq-mw</code> class for the parent of all <code>.n-wrapper</code> elements will ensure they have equal width as long as the viewport width is above or equal to 768px.</p>

    <pre><code class="lang-html">&lt;div class="n-flex n-flex-eq-mw grid-example"&gt;
    &lt;div class="n-wrapper"&gt;1&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;2&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;3&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;4&lt;/div&gt;
&lt;/div&gt;</code></pre>

    <div class="n-flex grid-example n-flex-eq-mw">
        <div class="n-wrapper">1</div>
        <div class="n-wrapper">2</div>
        <div class="n-wrapper">3</div>
        <div class="n-wrapper">4</div>
    </div>

    <h4>Conclusion</h4>

    <p>As you can see, these classes work well when you want each child element to have the same width. However, they have two limitations.</p>
    
    <ol>
        <li>
            <p>The number of elements in a row stays constant across multiple viewport widths.</p>
        </li>
        <li>
            <p>All child elements occupy a single row.</p>
        </li>
    </ol>

    <p>You can use classes from the next section to overcome these limitations.</p>

    <h3>Equal Width Child Elements (Advanced)</h3>

    <p>Let's say you want to ensure there is one element in a row when viewport width <code>(or vw) >= 576px</code> and <code>vw < 768px</code>, two elements when <code>vw >= 768px</code> and <code>vw < 992px</code>, three elements when <code>vw >= 992px</code> and <code>vw < 1200px</code>, four elements when <code>vw >= 1200px</code>.</p>

    <p>The easiest way to do so in NeatU is with the <code>n-flex-aw-1234</code> class.</p>

    <pre><code class="lang-html">&lt;div class="n-flex n-flex-aw-1234 grid-example"&gt;
    &lt;div class="n-wrapper"&gt;1&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;2&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;3&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;4&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;5&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;6&lt;/div&gt;
&lt;/div&gt;</code></pre>

    <div class="n-flex grid-example n-flex-aw-1234">
        <div class="n-wrapper">1</div>
        <div class="n-wrapper">2</div>
        <div class="n-wrapper">3</div>
        <div class="n-wrapper">4</div>
        <div class="n-wrapper">5</div>
        <div class="n-wrapper">6</div>
    </div>

    <p>Use the class <code>n-flex-aw-1234a</code> to ensure that leftover elements fill up the remaining space.</p>

    <pre><code class="lang-html">&lt;div class="n-flex n-flex-aw-1234a grid-example"&gt;
    &lt;div class="n-wrapper"&gt;1&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;2&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;3&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;4&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;5&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;6&lt;/div&gt;
&lt;/div&gt;</code></pre>

    <div class="n-flex grid-example n-flex-aw-1234a">
        <div class="n-wrapper">1</div>
        <div class="n-wrapper">2</div>
        <div class="n-wrapper">3</div>
        <div class="n-wrapper">4</div>
        <div class="n-wrapper">5</div>
        <div class="n-wrapper">6</div>
    </div>

    <h4>Examples</h4>

    <p>I will now show you examples of all such classes available in NeatU.</p>

    <p>.n-flex-aw-12, .n-flex-aw-112, .n-flex-aw-2, .n-flex-aw-1223, .n-flex-aw-1234, .n-flex-22334</p>

    <div class="n-flex grid-example n-flex-aw-1234">
        <div class="n-wrapper">1</div>
        <div class="n-wrapper">2</div>
        <div class="n-wrapper">3</div>
        <div class="n-wrapper">4</div>
        <div class="n-wrapper">5</div>
        <div class="n-wrapper">6</div>
    </div>

    <h3>Custom Width Child Elements</h3>

    <p>It is not always ideal to divide the available parent width equally among children. NeatU provides plenty of classes to let you specify element width at various viewport widths.</p>

    <h4>Specify Width as Percentage</h4>

    <p>Classes like <code>n-mw-5</code>, <code>n-mw-10</code>, ...., <code>n-mw-100</code> allow you to set the element width at 5%, 10%, ..., 100% when the viewport width is over 768px.</p>

    <p>You can use viewport specific classes to set the width for a particular element. For instance, the classes <code>n-sw-30</code>, <code>n-mw-40</code>, <code>n-lw-55</code>, <code>n-xlw-40</code>, <code>n-xxlw-30</code> will set the element width to 30%, 40%, 55%, 40%, and 30% on viewport widths above 576px, 768px, 992px, 1200px, and 1400px in the default configuration.</p>

    <pre><code class="lang-html">&lt;div class="n-flex grid-example"&gt;
    &lt;div class="n-wrapper n-sw-30 n-mw-40 n-lw-55 n-xlw-40 n-xxlw-30"&gt;1&lt;/div&gt;
    &lt;div class="n-wrapper n-sw-30 n-mw-20 n-lw-15 n-xlw-40 n-xxlw-30"&gt;2&lt;/div&gt;
    &lt;div class="n-wrapper n-sw-40 n-mw-40 n-lw-30 n-xlw-20 n-xxlw-40"&gt;3&lt;/div&gt;
&lt;/div&gt;</code></pre>

    <div class="n-flex grid-example">
        <div class="n-wrapper n-sw-30 n-mw-40 n-lw-55 n-xlw-40 n-xxlw-30">1</div>
        <div class="n-wrapper n-sw-30 n-mw-20 n-lw-15 n-xlw-40 n-xxlw-30">2</div>
        <div class="n-wrapper n-sw-40 n-mw-40 n-lw-30 n-xlw-20 n-xxlw-40">3</div>
    </div>

    <h4>Specify Width Using Fractions</h4>

    <p>You can set an elements width to 1/4, 2/5, or 1/2 of the parent by using the classes <code>n-*-25</code>, <code>n-*-40</code>, or <code>n-*-50</code> where the <code>*</code> could be <code>sw</code>, <code>mw</code>, <code>lw</code>, <code>xlw</code>, or <code>xxlw</code> depending on the viewport width you want to target.</p>

    <p>However, you cannot target other common fractions like 1/3, 2/3, or 1/6 this way.</p>

    <p>NeatU offers three classes <code>n-*-1-3</code>, <code>n-*-2-3</code>, and <code>n-*-1-6</code> to specify the size of different elements as fractions. Again, you can replace * with the viewport you are targeting like <code>sw</code>, <code>mw</code>, <code>lw</code>, <code>xlw</code>, or <code>xxlw</code>.</p>

    <h4>Example</h4>

    <p>Let's understand how all these classes can work together with an example.</p>

    <pre><code class="lang-html">&lt;div class="n-flex grid-example"&gt;
    &lt;div class="n-mw-1-3"&gt;Left&lt;/div&gt;
    &lt;div class="n-mw-2-3"&gt;Right&lt;/div&gt;
    &lt;div class="n-lw-2-3 n-mw-50 n-flex grid-example n-flex-eq-mw"&gt;
        &lt;div class="n-wrapper"&gt;1&lt;/div&gt;
        &lt;div class="n-wrapper"&gt;2&lt;/div&gt;
        &lt;div class="n-wrapper"&gt;3&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="n-lw-1-3 n-mw-50"&gt;Ad&lt;/div&gt;
&lt;/div&gt;</code></pre>

    <p>The left and right elements take up 1/3 and 2/3 of the parent's width respectively as long as viewport is at least 768px wide. Below 768px, they take up the parent's entire width.</p>

    <p>The nested grid and the Ad element take up 2/3 and 1/3 of the parent's width when viewport is at least 992px.</p>

    <p>Inside the nested grid, the child elements will divide the width equally as long as the viewport width is at least 992px. Below this threshold, each element will take up the parent's entire width.</p>

    <div class="n-flex grid-example">
        <div class="n-mw-1-3">Left</div>
        <div class="n-mw-2-3">Right</div>
        <div class="n-lw-2-3 n-mw-50 n-flex grid-example n-flex-eq-lw">
            <div class="n-wrapper">1</div>
            <div class="n-wrapper">2</div>
            <div class="n-wrapper">3</div>
        </div>
        <div class="n-lw-1-3 n-mw-50">Ad</div>
    </div>

    <h3>Forcefully Apply Custom Width</h3>

    <p>In some cases, you would probably want to place a custom width element in the same row as equal width elements.</p>

    <p>You could add a class like <code>n-mw-50</code> to set custom width on one child element but that won't work because of specificity.</p>

    <p>One solution here is to add the <code>n-flex-fw</code> class to the parent element which also has the <code>n-flex</code> class. After that, add the class <code>n-fw</code> on all elements where you want to force a specific width.</p>

    <p>Here is an example.</p>

    <pre><code class="lang-html">&lt;div class="n-flex n-flex-fw n-flex-eq-mw grid-example"&gt;
    &lt;div class="n-wrapper n-mw-50 n-lw-25 n-fw"&gt;1&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;2&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;3&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;4&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;5&lt;/div&gt;
    &lt;div class="n-wrapper"&gt;6&lt;/div&gt;
&lt;/div&gt;</code></pre>

    <p>We our forcing our Element '1' above to take up 25% of the parent's width on large screens and 50% on medium screens.</p>

    <div class="n-flex n-flex-fw n-flex-eq-mw grid-example">
        <div class="n-wrapper n-mw-50 n-lw-25 n-fw">1</div>
        <div class="n-wrapper">2</div>
        <div class="n-wrapper">3</div>
        <div class="n-wrapper">4</div>
        <div class="n-wrapper">5</div>
        <div class="n-wrapper">6</div>
    </div>

    <h2 id="colors">Colors</h2>

    <p>I have defined CSS variables for the following colors in NeatU. Each of these colors has an associated helper class that either sets the text color or background color.</p>

    <p>I also use the <code>color-mix()</code> function in CSS to create a darker or lighter version of the original colors by mixing black and white to it respectively.</p>

    <p>This keeps the size of stylesheet small while still allowing us to make subtle changes to text or background color on hover.</p>

    <div class="n-flex n-flex-eq-lw no-border">

        <div class="wrapper">
            <table class="color-table n-full-padding-sw n-hover-row">
                <tr>
                    <th>Variable Name</th>
                    <th>Color Value</th>
                    <th>How it Looks</th>
                </tr>
                <tr>
                    <td>--n-success-color</td>
                    <td>#4CAF50</td>
                    <td class="bg-success"></td>
                </tr>
                <tr>
                    <td>--n-failure-color</td>
                    <td>#E53935</td>
                    <td class="bg-failure"></td>
                </tr>
                <tr>
                    <td>--n-warning-color</td>
                    <td>#F57C00</td>
                    <td class="bg-warning"></td>
                </tr>
                <tr>
                    <td>--n-neutral-color</td>
                    <td>#2196F3</td>
                    <td class="bg-neutral"></td>
                </tr>
            </table>
        </div>

        <div class="wrapper">
            <table class="color-table n-full-padding-sw n-hover-row">
                <tr>
                    <th>Variable Name</th>
                    <th>Color Value</th>
                    <th>How it Looks</th>
                </tr>
                <tr>
                    <td>--n-text-color</td>
                    <td>#222222</td>
                    <td class="bg-text"></td>
                </tr>
                <tr>
                    <td>--n-border-color</td>
                    <td>#AAAAAA</td>
                    <td class="bg-border"></td>
                </tr>
                <tr>
                    <td>--n-brand-primary</td>
                    <td>#00796B</td>
                    <td class="bg-brand-primary"></td>
                </tr>
                <tr>
                    <td>--n-brand-secondary</td>
                    <td>#0c3671</td>
                    <td class="bg-brand-secondary"></td>
                </tr>
            </table>
        </div>
    </div>

    <p>You can always add more colors to this list by updating the <code>$colors</code> variables in the <b>neatu.scss</b> file.</p>

    <pre><code class="lang-css">$colors: (
    'green': #4CAF50,
    'red': #E53935,
    'orange': #F57C00,
    'azure': #2196F3,
    'text': #222222,
    'border': #AAAAAA,
    'brand-primary': #00796B,
    'brand-secondary': #0c3671
);</code></pre>

    <h3>Set Text Color</h3>

    <p>You can add the prefix <code>tc-</code> (<b>T</b>ext <b>C</b>olor) before all these color names to set text color. For example, using the classes <code>tc-neutral</code>, <code>tc-failure</code>, or <code>tc-success</code> on different elements will set their color to <span class="tc-neutral">azure</span>, <span class="tc-failure">red</span>, and <span class="tc-success">green</span>.</p>

    <p>Apply these classes to any element which has text whose color you want to change.</p>

    <pre><code class="lang-html">&lt;h2 class="tc-neutral no-mar"&gt;An Azure Colored Heading.&lt;/h2&gt;
&lt;a href="#link" class="tc-success"&gt;A mint green link.&lt;/a&gt;
&lt;p class="tc-ember-failure"&gt;For instance, here is a paragraph with ember red text. Multiple &lt;code&gt;span&lt;/code&gt; elements within it have &lt;span class="tc-neutral"&gt;azure color&lt;/span&gt;, &lt;span class="tc-mint-success"&gt;mint green color&lt;/span&gt;, and &lt;span class="tc-ruby"&gt;ruby color&lt;/span&gt;.&lt;/p&gt;</code></pre>

    <div class="result n-round n-bshadow">
        <h2 class="tc-brand-primary no-mar">Heading with Primary Brand Color.</h2>
        <a href="#link" class="tc-brand-secondary">Link with Secondary Brand Color.</a>
        <p class="tc-failure">For instance, here is a paragraph with red text. Multiple <code>span</code> elements within it have <span class="tc-neutral">azure color</span>, <span class="tc-success">green color</span>, and <span class="tc-warning">orange color</span>.</p>
    </div>

    <h3>Change Text Color on Hover</h3>

    <p>Use the prefix <code>tch-</code> (<b>T</b>ext <b>C</b>olor <b>H</b>over) with different color names to change the text color on hover. Hovering over the element will change the text color to 85% original and 15% black.</p>

    <p>For instance, you can use the class <code>tch-neutral</code> to <span class="tch-neutral">set the text color to Azure</span> or <code class="bg-neutral tc-white s-pad-x2">#2196F3</code>. When you hover over the azure text, the color will change to <span class="tc-white s-pad-x2" style="background: #1C7FCE;">#1C7FCE</span>.</p>

    <p>Use the prefix <code>tclh-</code> (<b>T</b>ext <b>C</b>olor <b>L</b>ight <b>H</b>over) to start with a lighter shade of the original color that has 50% white mixed in it. When someone hover over the text, the color will only have 30% white in it.</p>

    <p>The following examples illustrates how each prefix works for a heading.</p>

    <pre><code class="lang-html">&lt;h1 class="tch tclh-success no-mar"&gt;Prepare for Trouble, Make it Double&lt;/h1&gt;
&lt;h1 class="tch tch-failure no-mar"&gt;My Adulting Skills: Questionable at Best&lt;/h1&gt;
</code></pre>

    <div class="result n-round n-bshadow">
        <h1 class="tch tclh-success no-mar">Prepare for Trouble, Make it Double</h1>
        <h1 class="tch tch-failure no-mar">My Adulting Skills: Questionable at Best</h1>
    </div>

    <h3>Apply Background Color</h3>

    <p>Use the prefix <code>bg-</code> (<b>B</b>ack<b>G</b>round) with a color name to apply a background color to different elements.</p>

    <p>If you feel that black colored text isn't properly visible on some backgrounds, you can always add the class <code>tc-white</code> to turn the text white.</p>

    <p>You might also consider using the prefix <code>bgl-</code> (<b>B</b>ack<b>G</b>round <b>L</b>ight) with a color name to use a light shade of the color that has 50% white as background.</p>

    <pre><code class="lang-html">&lt;h1 class="bgl-success no-mar s-lr-pad-x4 s-tb-mar-x2"&gt;Heading With Light Green Background.&lt;/h1&gt;
&lt;h1 class="tc-white bg-success s-lr-pad-x4 no-mar"&gt;Heading With Azure Background.&lt;/h1&gt;

&lt;p&gt;A paragraph containing multiple span elements with &lt;span class="bgl-warning s-pad-x2"&gt;orange&lt;/span&gt;, &lt;span class="bg-neutral s-pad-x2"&gt;azure&lt;/span&gt;, &lt;span class="bgl-failure s-pad-x2"&gt;red&lt;/span&gt; background and black text.&lt;/p&gt;
&lt;p&gt;A paragraph containing multiple span elements with &lt;span class="bg-warning tc-white s-pad-x2"&gt;orange&lt;/span&gt;, &lt;span class="bg-eggplant tc-white s-pad-x2"&gt;eggplant&lt;/span&gt;, &lt;span class="bg-ruby tc-white s-pad-x2"&gt;ruby&lt;/span&gt; background and white text.&lt;/p&gt;
</code></pre>

    <div class="result n-round n-bshadow">

        <h1 class="bgl-success no-mar s-lr-pad-x4 s-tb-mar-x2">Heading With Light Green Background.</h1>
        <h1 class="tc-white bg-neutral s-lr-pad-x4 no-mar">Heading With Azure Background.</h1>

        <p>A paragraph containing multiple span elements with <span class="bgl-warning s-pad-x2">light orange</span>, <span class="bgl-neutral s-pad-x2">azure</span>, <span class="bgl-failure s-pad-x2">red</span> background and black text.</p>
        <p>A paragraph containing multiple span elements with <span class="bg-warning tc-white s-pad-x2">orange</span>, <span class="bg-neutral tc-white s-pad-x2">eggplant</span>, <span class="bg-failure tc-white s-pad-x2">ruby</span> background and white text.</p>

    </div>

    <h3>Change Background Color on Hover</h3>

    <p>As you might have guessed, the prefixes for changing the background color on hover are <code>bgh-</code> (<b>B</b>ack<b>G</b>round <b>H</b>over) and <code>bglh-</code> (<b>B</b>ack<b>G</b>round <b>L</b>ight <b>H</b>over) respectively for normal and light color variants.</p>

    <div class="result n-round n-bshadow">
        <h1 class="bgh bgh-brand-primary no-mar s-pad">Heading with Brand Primary Background.</h1>

        <p>A paragraph containing multiple span elements with <span class="bglh-warning s-pad-x2">light orange</span>, <span class="bglh-neutral s-pad-x2">light azure</span>, and <span class="bglh-failure s-pad-x2">light red</span> background.</p>

        <p>A paragraph containing multiple span elements with <span class="bgh-warning tc-white s-pad-x2">orange</span>, <span class="bgh-neutral tc-white s-pad-x2">azure</span>, <span class="bgh-failure tc-white s-pad-x2">red</span> background.</p>
    </div>

    <h2>Buttons</h2>

    <p>You can create buttons in NeatU by using the class <code>n-btn</code> like this: </p>

    <pre><code class="lang-html">&lt;button class="n-btn"&gt;Normal Button&lt;/button&gt;
</code></pre>

    <p>The result looks like this:</p>

    <button class="n-btn">Normal Button</button>

    <h3>Add Background Color to Buttons</h3>

    <p>You can add classes like <code>bglh-neutral</code>, <code>bglh-failure-warning</code>, and <code>bglh-mint-success</code> to add a background color to the buttons. I have already explained how these classes work in the <a href="#colors">Colors section</a>.</p>

    <p>If you want to create a disabled button simply add the class <code>disabled-btn</code>.</p>

    <pre><code class="lang-html">&lt;button class="n-btn bglh-neutral"&gt;Normal Button&lt;/button&gt;
&lt;button class="n-btn bglh-failure-warning"&gt;Red Button&lt;/button&gt;
&lt;button class="n-btn bglh-mint-success"&gt;Orange Button&lt;/button&gt;
&lt;button class="n-btn disabled-btn"&gt;Disabled Button&lt;/button&gt;  
</code></pre>

    <div class="result n-round n-bshadow">
        <button class="n-btn bglh-neutral">Azure Button</button>
        <button class="n-btn bglh-failure">Red Button</button>
        <button class="n-btn bglh-warning">Orange Button</button>
        <button class="n-btn bglh-success">Green Button</button>
        <button class="n-btn disabled-btn">Disabled Button</button>
    </div>

    <p>All buttons you create will have a black text color by default. However, black text is hard to read on dark backgrounds. You should consider adding the <code>tc-white</code> class to any buttons with a dark background to add enough contrast.</p>

    <pre><code class="lang-html">&lt;button class="n-btn tc-white bgh-neutral"&gt;Azure Button&lt;/button&gt;
&lt;button class="n-btn tc-white bgh-failure"&gt;Red Button&lt;/button&gt;
&lt;button class="n-btn tc-white bgh-warning"&gt;Orange Button&lt;/button&gt;
&lt;button class="n-btn tc-white bgh-success"&gt;Green Button&lt;/button&gt;
&lt;button class="n-btn disabled-btn tc-white"&gt;Disabled Button&lt;/button&gt;  
</code></pre>

    <div class="result n-round n-bshadow">
        <button class="n-btn tc-white bgh-neutral">Azure Button</button>
        <button class="n-btn tc-white bgh-failure">Red Button</button>
        <button class="n-btn tc-white bgh-warning">Red Button</button>
        <button class="n-btn tc-white bgh-success">Green Button</button>
        <button class="n-btn disabled-btn tc-white">Disabled Button</button>
    </div>

    <h3>Add Rounded Corners to Buttons</h3>

    <p>Simply add classes like <code>n-round</code>, <code>n-round-x2</code>, ... , <code>n-round-x5</code> to the button which should have rounded corners.</p>


    <pre><code class="lang-html">&lt;button class="n-btn tc-white n-round disabled-btn bgh-gray"&gt;Disabled Button&lt;/button&gt;
&lt;button class="n-btn tc-white n-round-x2 bgh-neutral"&gt;Normal Button&lt;/button&gt;
&lt;button class="n-btn tc-white n-round-x3 bgh-failure"&gt;Danger Button&lt;/button&gt;
&lt;button class="n-btn tc-white n-round-x3 bgh-warning"&gt;Danger Button&lt;/button&gt;
&lt;button class="n-btn tc-white n-round-x4 bgh-success"&gt;Success Button&lt;/button&gt;
</code></pre>

    <div class="result n-round n-bshadow">
        <button class="n-btn tc-white n-round bgh-neutral">Azure Button</button>
        <button class="n-btn tc-white n-round-x2 bgh-failure">Red Button</button>
        <button class="n-btn tc-white n-round-x3 bgh-warning">Orange Button</button>
        <button class="n-btn tc-white n-round-x4 bgh-success">Green Button</button>
        <button class="n-btn tc-white n-round-x5 disabled-btn">Disabled Button</button>
    </div>

    <h3>Create Buttons with Outlines</h3>

    <p>Use the <code>n-outline</code> helpers classes to create buttons with a white background but colorful outline that matches the text color.</p>

    <p>You can set the text color by using <code>tch-</code> classes I mentioned in the <a href="#colors">Colors section</a>.</p>

    <pre><code class="lang-html">&lt;button class="n-btn n-outline tch-neutral"&gt;Normal Button&lt;/button&gt;
&lt;button class="n-btn n-outline disabled-btn tcl-text"&gt;Disabled Button&lt;/button&gt;
&lt;button class="n-btn n-outline-x2 tch-failure"&gt;Red Button&lt;/button&gt;
&lt;button class="n-btn n-outline-x3 tch-warning"&gt;Orange Button&lt;/button&gt;
&lt;button class="n-btn n-outline-x4 tch-success"&gt;Green Button&lt;/button&gt;
</code></pre>

    <div class="result rounded n-bshadow">
        <button class="n-btn n-outline tch-neutral">Normal Button</button>
        <button class="n-btn n-outline disabled-btn tcl-text">Disabled Button</button>
        <button class="n-btn n-outline-x2 tch-failure">Red Button</button>
        <button class="n-btn n-outline-x3 tch-warning">Orange Button</button>
        <button class="n-btn n-outline-x4 tch-success">Green Button</button>
    </div>

    <h3>Create Buttons with Borders</h3>

    <p>If you want to create buttons that have a background as well as borders, you should use the <code>n-border</code> helper classes.</p>

    <div class="result rounded n-bshadow">
        <button class="n-btn tc-white bgh-neutral n-border">Normal Button</button>
        <button class="n-btn tc-white bgh-warning n-border-x2">Orange Button</button>
        <button class="n-btn tc-white bgh-success n-border-x3">Green Button</button>
        <button class="n-btn tc-white bgh-failure n-border-x4">Red Button</button>
    </div>

    <h3>Using Button Classes on Links and Input Elements</h3>

    <p>You can add the <code>n-btn</code> class to tags like <code>a</code> and <code>input</code> to give them appearance of a button.</p>

    <p>Use a combination of <code>n-border</code>, <code>n-outline</code>, and helper color classes to get desired results.</p>

    <div class="result rounded n-bshadow">
        <a href="https://hellonitish.com" class="n-btn n-border-x2 bglh-failure tc-white">Link Button</a>
        <input type="button" value="Input Button" class="n-btn n-border-x2 bglh-neutral">
        <input type="submit" value="Submit Button" class="n-btn n-outline-x2 tch-success">
        <input type="reset" value="Reset Button (Disabled)" class="n-btn n-border-x2 disabled-btn">
    </div>

    <h2>Form Elements</h2>

    <div class="n-flex n-flex-eq-mw no-border">
        <form action="">
            <div class="form-group">
                <label for="username">Email Address</label>
                <input name="username" type="email" placeholder="hello@nitish.com">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text">
                <p class="form-help">Username should only have alphanumeric characters.</p>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password">
                <p class="form-help">Minimum 8-12 characters.</p>
            </div>
            <div class="form-group">
                <div class="n-wrapper">
                    <input class="n-success-btn" type="submit" value="Register">
                    <input class="n-normal-btn" type="reset" value="Reset">
                </div>
            </div>
        </form>
        <form action="">
            <div class="form-group">
                <div class="n-flex n-flex-acjsb">
                    <label class="n-mw-40" for="username">Username</label>
                    <input class="n-mw-55" name="username" type="text">
                </div>
                <p class="form-help">Username should only have alphanumeric chatacters.</p>
            </div>
            <div class="form-group">
                <div class="n-flex n-flex-acjsb">
                    <label class="n-mw-40" for="password">Password</label>
                    <input class="n-mw-55" name="password" type="password">
                </div>
                <p class="form-help">Minimum 8-12 characters.</p>
            </div>

            <div class="form-group">
                <div class="n-wrapper">
                    <input class="n-success-btn" type="submit" value="Login">
                </div>
            </div>
        </form>
    </div>

    <div class="n-flex n-flex-eq-mw no-border">
        <form action="">
            <p>Which of these is your favorite food?</p>
            <div class="form-group">
                <div class="n-flex n-flex-acjs">
                    <input class="wd-fit" type="checkbox" name="pasta" id="">
                    <label class="wd-fit" for="pasta">Pasta</label>
                </div>
            </div>
            <div class="form-group">
                <div class="n-flex n-flex-acjs">
                    <input class="wd-fit" type="checkbox" name="pizza" id="">
                    <label class="wd-fit" for="pasta">Pizza</label>
                </div>
            </div>
            <div class="form-group">
                <div class="n-flex n-flex-acjs">
                    <input class="wd-fit" type="checkbox" name="dosa" id="">
                    <label class="wd-fit" for="pasta">Dosa</label>
                </div>
            </div>

            <p>Do you like NeatU?</p>
            <div class="form-group">
                <div class="n-flex n-flex-acjs">
                    <input class="wd-fit" type="radio" name="n-like" id="n-like-yes">
                    <label class="wd-fit" for="n-like-yes">Yes</label>
                </div>
            </div>
            <div class="form-group">
                <div class="n-flex n-flex-acjs">
                    <input class="wd-fit" type="radio" name="n-like" id="n-like-no">
                    <label class="wd-fit" for="n-like-no">No</label>
                </div>
            </div>
        </form>
    </div>

    <h2>Images</h2>

    <p>Here are three images of different sizes each wrapped inside its own <code>div</code> element. This gives you better control over the spacing within the images.</p>

    <pre><code class="language-html">
&lt;div class="n-flex gapped n-flex-eq-mw no-border"&gt;
    &lt;div&gt;&lt;img class="n-image-responsive" src="randomly-generated-placehold.co-url"&gt;&lt;/div&gt;
    &lt;div&gt;&lt;img class="n-image-responsive n-round" src="randomly-generated-placehold.co-url"&gt;&lt;/div&gt;
    &lt;div&gt;&lt;img class="n-image-responsive n-round-x5" src="randomly-generated-placehold.co-url"&gt;&lt;/div&gt;
&lt;/div&gt;

</code></pre>

    <p>The whole code is wrapped inside a <code>n-flex</code> element with class <code>n-flex-eq-mw</code>.</p>

    <p>You might remember that <code>n-flex-eq-mw</code> makes sure all children have equal width when viewport width >= 768px.</p>

    <p>Images become responsive when you add the class <code>n-image-responsive</code>.</p>

    <div class="n-flex gapped n-flex-eq-mw no-border sc-pad-x4">
        <div class="n-wrapper"><img class="n-image-responsive" src="<?php echo generateRandomPlaceholderUrl('Elephants', 720); ?>" alt=""></div>
        <div class="n-wrapper"><img class="n-image-responsive n-round" src="<?php echo generateRandomPlaceholderUrl('Crocodiles', 480); ?>" alt=""></div>
        <div class="n-wrapper"><img class="n-image-responsive n-round-x5" src="<?php echo generateRandomPlaceholderUrl('Kangaroos', 520); ?>" alt=""></div>
    </div>

    <h2>Figures</h2>

    <p>We use the <code>figure</code> element to display images, diagrams, code snippets etc. with an optional caption that goes inside the <code>figcaption</code> element.</p>

    <p>You can use the following markup to display responsive <code>figure</code> elements using NeatU.</p>

    <pre>
<code class="language-html">
&lt;figure&gt;
    &lt;img class="n-image-responsive" src="randomly-generated-placehold.co-url"&gt;
    &lt;figcaption class="talign-start"&gt;This is a sample caption&lt;/figcaption&gt;
&lt;/figure&gt;

</code>
</pre>

    <p>Add the classes <code>n-round</code> and <code>n-round-x5</code> to the images to apply a border-radius.</p>

    <p>You can also add the classes <code>talign-start</code>, <code>talign-center</code>, and <code>talign-end</code> to the <code>figcaption</code> element to control text alignment.</p>

    <div class="n-flex gapped n-flex-eq-mw no-border neatu-flex-as sc-pad-x4">
        <div class="n-wrapper">
            <figure>
                <img class="n-image-responsive" src="<?php echo generateRandomPlaceholderUrl(); ?>" alt="">
                <figcaption class="talign-start">This is a sample caption</figcaption>
            </figure>
        </div>
        <div class="n-wrapper">
            <figure>
                <img class="n-image-responsive n-round" src="<?php echo generateRandomPlaceholderUrl(); ?>" alt="">
                <figcaption class="talign-center">This is a sample caption</figcaption>
            </figure>
        </div>
        <div class="n-wrapper">
            <figure>
                <img class="n-image-responsive n-round-x5" src="<?php echo generateRandomPlaceholderUrl(); ?>" alt="">
                <figcaption class="talign-end">This is a sample caption</figcaption>
            </figure>
        </div>
    </div>

    <p>Add the classes <code>caption-overlay</code>, <code>n-bshadow</code>, and <code>n-border</code> to the figure element to apply different styling.</p>

    <pre><code class="language-html">
&lt;div&gt;
    &lt;figure class="caption-overlay"&gt;
        &lt;img class="n-image-responsive" src="randomly-generated-placehold.co-url"&gt;
        &lt;figcaption&gt;This is a sample caption&lt;/figcaption&gt;
    &lt;/figure&gt;
&lt;/div&gt;
&lt;div&gt;
    &lt;figure class="n-bshadow n-round-x5"&gt;
        &lt;img class="n-image-responsive n-round-x5" src="randomly-generated-placehold.co-url" &gt;
        &lt;figcaption&gt;This is a sample caption&lt;/figcaption&gt;
    &lt;/figure&gt;
&lt;/div&gt;
&lt;div&gt;
    &lt;figure class="n-border n-round"&gt;
        &lt;img class="n-image-responsive n-round" src="randomly-generated-placehold.co-url"&gt;
        &lt;figcaption&gt;This is a sample caption&lt;/figcaption&gt;
    &lt;/figure&gt;
&lt;/div&gt;

</code></pre>

    <div class="n-flex gapped n-flex-eq-mw no-border neatu-flex-as  sc-pad-x4">
        <div class="n-wrapper">
            <figure class="caption-overlay">
                <img class="n-image-responsive" src="<?php echo generateRandomPlaceholderUrl(); ?>" alt="">
                <figcaption>This is a sample caption</figcaption>
            </figure>
        </div>
        <div class="n-wrapper">
            <figure class="n-bshadow n-round-x5">
                <img class="n-image-responsive n-round-x5" src="<?php echo generateRandomPlaceholderUrl(); ?>" alt="">
                <figcaption>This is a sample caption</figcaption>
            </figure>
        </div>
        <div class="n-wrapper">
            <figure class="n-border n-round">
                <img class="n-image-responsive n-round" src="<?php echo generateRandomPlaceholderUrl(); ?>" alt="">
                <figcaption>This is a sample caption</figcaption>
            </figure>
        </div>
    </div>

    <h2>Cards</h2>

    <p>You can use the class <code>n-card</code> to create cards that display an image along with some textual description using a variety of elements like headings, paragraphs, links, and buttons.</p>

    <pre>
<code class="language-html">
&lt;div class="n-wrapper"&gt;
    &lt;div class="n-card n-oxsw-75"&gt;
        &lt;img class="n-image-responsive" src="&lt;?php echo generateRandomPlaceholderUrl(); ?&gt;" alt=""&gt;
        &lt;div class="n-card-body"&gt;
            &lt;h3&gt;What do you call a pony with a cough?&lt;/h3&gt;
            &lt;p&gt;A little horse.&lt;/p&gt;

            &lt;a class="n-btn n-normal-btn" href="https://hellonitish.com"&gt;Vist Hello Nitish&lt;/a&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code>
</pre>

    <div class="n-flex gapped n-flex-aw-2 n-flex-eq-lw no-border n-flex-al-stretch  sc-pad-x4">
        <div class="n-wrapper">
            <div class="n-card n-oxsw-75">
                <img class="n-image-responsive" src="<?php echo generateRandomPlaceholderUrl(); ?>" alt="">
                <div class="n-card-body">
                    <h3>Want to know what else I have created?</h3>
                    <p>Simply visit my website.</p>

                    <a class="n-btn bglh-success" href="https://hellonitish.com">Visit Hello Nitish</a>
                </div>
            </div>
        </div>

        <div class="n-wrapper">
            <div class="n-card n-oxsw-75">
                <img class="n-image-responsive" src="<?php echo generateRandomPlaceholderUrl(); ?>" alt="">
                <div class="n-card-body">
                    <h3>What's the best thing about Switzerland?</h3>
                    <p>I don't know, but the flag is a big plus.</p>
                </div>
            </div>
        </div>

        <div class="n-wrapper">
            <div class="n-card n-oxsw-75">
                <img class="n-image-responsive" src="<?php echo generateRandomPlaceholderUrl(); ?>" alt="">
                <div class="n-card-body">
                    <h3>Did you know?</h3>
                    <p>Elephants have the largest brain in all of the animal kingdom. Their brain can weigh up to 5.4kg.</p>

                    <p><a href="https://factanimal.com/elephants/">More Elephant Facts</a></p>
                </div>
            </div>
        </div>
    </div>

    <h3>Horizontal Cards</h3>

    <p>Add the class <code>n-card-horizontal</code> to display the card content horizontally.</p>

    <p>You might have noticed vertical cards have a border applied to them by default. However, the horizontal cards don't.</p>

    <p>This is because the image in horizontal cards does'nt always take up the entire height of the card. As a result, the car borders only touched one side of the image instead of three and it looked weird.</p>

    <div class="n-flex gapped n-flex-aw-112 no-border n-flex-al-stretch sc-pad-x4">
        <div class="n-wrapper">
            <div class="n-card n-card-horizontal n-oxsw-75">
                <img class="n-image-responsive n-sw-40 n-omw-25" src="<?php echo generateRandomPlaceholderUrl('Dad Joke', 500); ?>" alt="">
                <div class="n-card-body n-sw-60 n-omw-75">
                    <h3>My son asked me if we were pyromaniacs.</h3>
                    <p>I replied "yes we arson".</p>
                </div>
            </div>
        </div>

        <div class="n-wrapper">
            <div class="n-card n-card-horizontal n-oxsw-75">
                <img class="n-image-responsive n-sw-40 n-omw-25" src="<?php echo generateRandomPlaceholderUrl('Awesome\nFacts', 500); ?>" alt="">
                <div class="n-card-body n-sw-60 n-omw-75">
                    <h3>Did you know?</h3>
                    <p>Ants can lift 20 to 50 times their own body weight.</p>
                </div>
            </div>
        </div>
    </div>

    <p>The elements in horizontal cards are laid out vertically when viewport is less than 576px wide. This makes sure the elements aren't squished on narrow screens.</p>

    <h3>Additional Card Styling</h3>

    <p>You can always add classes <code>n-bshadow</code>, <code>n-border</code>, and <code>n-round-x5</code> to modify the appearance of cards a bit.</p>

    <p>For instance, the code below generates a card with additional styling coming from the classes <code>n-border</code>, <code>n-bshadow</code> and <code>n-round-x5</code>.</p>

    <pre><code class="language-html">
&lt;div class="n-wrapper"&gt;
    &lt;div class="n-card n-border n-card-horizontal n-oxsw-75"&gt;
        &lt;img class="n-image-responsive n-sw-40 n-omw-25" src="&lt;?php echo generateRandomPlaceholderUrl('Dad Joke', 500); ?&gt;" alt=""&gt;
        &lt;div class="n-card-body n-sw-60 n-omw-75"&gt;
            &lt;h3&gt;My wife and I laugh at hoe competitive we are.&lt;/h3&gt;
            &lt;p&gt;But I laugh more.&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;div class="n-wrapper"&gt;
    &lt;div class="n-card n-bshadow n-round-x5 n-card-horizontal n-oxsw-75"&gt;
        &lt;img class="n-image-responsive n-sw-40 n-omw-25 n-round-x5" src="&lt;?php echo generateRandomPlaceholderUrl('Awesome\nFacts', 500); ?&gt;" alt=""&gt;
        &lt;div class="n-card-body n-sw-60 n-omw-75"&gt;
            &lt;h3&gt;Did you know?&lt;/h3&gt;
            &lt;p&gt;Mercury has water ice on its surface, despite the high temperatures.&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code></pre>


    <div class="n-flex gapped n-flex-aw-112 no-border n-flex-al-stretch sc-pad-x4">
        <div class="n-wrapper">
            <div class="n-card n-border n-card-horizontal n-oxsw-75">
                <img class="n-image-responsive n-sw-40 n-omw-25" src="<?php echo generateRandomPlaceholderUrl('Dad Joke', 500); ?>" alt="">
                <div class="n-card-body n-sw-60 n-omw-75">
                    <h3>My wife and I laugh at how competitive we are.</h3>
                    <p>But I laugh more.</p>
                </div>
            </div>
        </div>

        <div class="n-wrapper">
            <div class="n-card n-bshadow n-round-x5 n-card-horizontal n-oxsw-75">
                <img class="n-image-responsive n-sw-40 n-omw-25 n-round-x5" src="<?php echo generateRandomPlaceholderUrl('Awesome\nFacts', 500); ?>" alt="">
                <div class="n-card-body n-sw-60 n-omw-75">
                    <h3>Did you know?</h3>
                    <p>Mercury has water ice on its surface, despite the high temperatures.</p>
                </div>
            </div>
        </div>
    </div>


    <pre>
<code class="language-html">
&lt;div class="n-flex n-flex-eq-mw n-flex-al-stretch"&gt;
    &lt;div class="n-wrapper"&gt;
        &lt;div class="n-card n-bshadow n-round-x5"&gt;
            &lt;img class="n-image-responsive" src="randomly-generated-placehold.co-url"&gt;
            &lt;div class="n-card-body"&gt;
                    &lt;h3&gt;What's the best thing about Switzerland?&lt;/h3&gt;
                    &lt;p&gt;I don't know, but the flag is a big plus.&lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code>
</pre>

    <div class="n-flex gapped n-flex-aw-2 n-flex-eq-lw no-border n-flex-al-stretch sc-pad-x4">
        <div class="n-wrapper">
            <div class="n-card n-bshadow n-oxsw-75">
                <img class="n-image-responsive" src="<?php echo generateRandomPlaceholderUrl('Dad\nJoke', 600); ?>" alt="">
                <div class="n-card-body">
                    <h3>How does a short dad measure success?</h3>
                    <p>In short-steps and big smiles!</p>
                </div>
            </div>
        </div>

        <div class="n-wrapper">
            <div class="n-card n-border n-oxsw-75">
                <img class="n-image-responsive" src="<?php echo generateRandomPlaceholderUrl('Clock\nWallpaper'); ?>" alt="">
                <div class="n-card-body">
                    <h3>What does the clock wallpaper do?</h3>
                    <p>It shows you the current time, date, and weather conditions in your location.</p>
                    <p><a href="https://hellonitish.com/tools/clock.html" target="_blank">Clock Wallpaper by Nitish</a></p>
                </div>
            </div>
        </div>

        <div class="n-wrapper">
            <div class="n-card n-bshadow n-round-x5 n-oxsw-75">
                <img class="n-image-responsive n-round-x5" src="<?php echo generateRandomPlaceholderUrl('Fun\nFacts'); ?>" alt="">
                <div class="n-card-body">
                    <h3>Did you know?</h3>
                    <p>The average person has 67 different species of bacteria in their belly button.</p>
                    <p>Read more <a href="https://www.natgeokids.com/uk/discover/science/general-science/15-facts-about-the-human-body/" target="_blank">fun facts about the human body</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Accordion</h2>

    <p>You can create an accordion in NeatU with the following markup.</p>

    <pre><code class="language-html">
&lt;div class="n-accordion"&gt;
    &lt;div class="n-acc-item"&gt;
        &lt;div class="n-acc-item-head n-sflex"&gt;
            &lt;h3&gt;Why is the framework named "Neatu?"&lt;/h3&gt; &lt;i class="fa-solid fa-plus"&gt;&lt;/i&gt;
        &lt;/div&gt;
        &lt;div class="n-acc-item-body"&gt;
            &lt;p&gt;People close to me call me "nitu". So, I thought I will use the word NeatU while naming my development projects.&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="n-acc-item"&gt;
        &lt;div class="n-acc-item-head n-sflex"&gt;
            &lt;h3&gt;Who do I contact if I want to request some new features in "NeatU CSS Framework"?&lt;/h3&gt; &lt;i class="fa-solid fa-plus"&gt;&lt;/i&gt;
        &lt;/div&gt;
        &lt;div class="n-acc-item-body"&gt;
            &lt;p&gt;You can let me know on &lt;a href="https://github.com"&gt;GitHub&lt;/a&gt;.&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="n-acc-item"&gt;
        &lt;div class="n-acc-item-head n-sflex"&gt;
            &lt;h3&gt;How do I contribute to the project?&lt;/h3&gt; &lt;i class="fa-solid fa-plus"&gt;&lt;/i&gt;
        &lt;/div&gt;
        &lt;div class="n-acc-item-body"&gt;
            &lt;p&gt;Again, GitHub is the best way to contribute.&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code></pre>

    <p>The markup above creates the following accordion.</p>

    <div class="n-accordion">
        <div class="n-acc-item">
            <div class="n-acc-item-head n-sflex">
                <h3>Why is the framework named "Neatu?"</h3> <i class="fa-solid fa-plus"></i>
            </div>
            <div class="n-acc-item-body">
                <p>People close to me call me "nitu". So, I thought I will use the word NeatU while naming my development projects.</p>
            </div>
        </div>
        <div class="n-acc-item">
            <div class="n-acc-item-head n-sflex">
                <h3>Who do I contact if I want to request some new features in "NeatU CSS Framework"?</h3> <i class="fa-solid fa-plus"></i>
            </div>
            <div class="n-acc-item-body">
                <p>You can let me know on <a href="https://github.com">GitHub</a>.</p>
            </div>
        </div>
        <div class="n-acc-item">
            <div class="n-acc-item-head n-sflex">
                <h3>How do I contribute to the project?</h3> <i class="fa-solid fa-plus"></i>
            </div>
            <div class="n-acc-item-body">
                <p>Again, GitHub is the best way to contribute.</p>
            </div>
        </div>
    </div>

    <p>You can add the class <code>n-acc-stay-open</code> to any <code>n-acc-item</code> to keep it open unless a user explicitly closes it.</p>

    <div class="n-accordion n-border n-round-x3">
        <div class="n-acc-item n-acc-stay-open">
            <div class="n-acc-item-head n-round-x3 n-sflex">
                <h3>Why is the framework named "Neatu?"</h3> <i class="fa-solid fa-minus"></i>
            </div>
            <div class="n-acc-item-body">
                <p>People close to me call me "nitu". So, I thought I will use the word NeatU while naming my development projects.</p>
            </div>
        </div>
        <div class="n-acc-item">
            <div class="n-acc-item-head n-round-x3 n-sflex">
                <h3>Who do I contact if I want to request some new features in "NeatU CSS Framework"?</h3> <i class="fa-solid fa-plus"></i>
            </div>
            <div class="n-acc-item-body">
                <p>You can let me know on <a href="https://github.com">GitHub</a>.</p>
            </div>
        </div>
        <div class="n-acc-item">
            <div class="n-acc-item-head n-round-x3 n-sflex">
                <h3>How do I contribute to the project?</h3> <i class="fa-solid fa-plus"></i>
            </div>
            <div class="n-acc-item-body">
                <p>Again, GitHub is the best way to contribute.</p>
            </div>
        </div>
    </div>

    <h2>Tables</h2>

    <p>Here is a normal table with no classes except those which determine its width (<code>n-lw-75</code>, <code>n-xlw-60</code>, and <code>n-full-padding-sw</code>.</p>

    <p>The color in the table comes from the value of the variable <code>var(--n-brand-primary-color)</code> in CSS.</p>

    <table class="n-full-padding-sw">
        <tr>
            <th>Rank</th>
            <th>Country</th>
            <th>Population</th>
        </tr>
        <tr>
            <td>1</td>
            <td>India</td>
            <td>1,428,627,663</td>
        </tr>
        <tr>
            <td>2</td>
            <td>China</td>
            <td>1,425,671,352</td>
        </tr>
        <tr>
            <td>3</td>
            <td>United States</td>
            <td>339,996,563</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Indonesia</td>
            <td>277,534,122</td>
        </tr>
    </table>

    <p>This table has two classes <code>n-striped</code> and <code>n-hover-row</code> applied to it.</p>

    <table class="n-full-padding-sw n-striped n-hover-row">
        <tr>
            <th>Rank</th>
            <th>Country</th>
            <th>Population</th>
        </tr>
        <tr>
            <td>1</td>
            <td>India</td>
            <td>1,428,627,663</td>
        </tr>
        <tr>
            <td>2</td>
            <td>China</td>
            <td>1,425,671,352</td>
        </tr>
        <tr>
            <td>3</td>
            <td>United States</td>
            <td>339,996,563</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Indonesia</td>
            <td>277,534,122</td>
        </tr>
    </table>

    <p>The class <code>n-column-borders</code> makes sure the columns are separated by borders while the rows have no borders.</p>

    <p>The class <code>n-colored-th</code> applies the brand color to the text while making the background white.</p>

    <table class="n-full-padding-sw n-column-borders n-colored-th">
        <tr>
            <th>Rank</th>
            <th>Country</th>
            <th>Population</th>
        </tr>
        <tr>
            <td>1</td>
            <td>India</td>
            <td>1,428,627,663</td>
        </tr>
        <tr>
            <td>2</td>
            <td>China</td>
            <td>1,425,671,352</td>
        </tr>
        <tr>
            <td>3</td>
            <td>United States</td>
            <td>339,996,563</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Indonesia</td>
            <td>277,534,122</td>
        </tr>
    </table>

    <p>The class <code>n-row-borders</code> only applies borders to rows. I have also added the classes <code>n-striped</code> for additional styling.</p>

    <table class="n-full-padding-sw n-row-borders n-striped">
        <tr>
            <th>Rank</th>
            <th>Country</th>
            <th>Population</th>
        </tr>
        <tr>
            <td>1</td>
            <td>India</td>
            <td>1,428,627,663</td>
        </tr>
        <tr>
            <td>2</td>
            <td>China</td>
            <td>1,425,671,352</td>
        </tr>
        <tr>
            <td>3</td>
            <td>United States</td>
            <td>339,996,563</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Indonesia</td>
            <td>277,534,122</td>
        </tr>
    </table>

    <p>Combine different classes to achieve unique results.</p>

    <ol>
        <li>
            <p><code>n-striped</code> will add a different background color to alternate rows.</p>
        </li>
        <li>
            <p><code>n-hover-row</code> will highlight the row you are hovering by adding a background color.</p>
        </li>
        <li>
            <p><code>n-column-borders</code> will add borders to columns keeping rows borderless. It also adds a border just below <code>th</code> for separation.</p>
        </li>
        <li>
            <p><code>n-row-borders</code> will add borders to rows keeping columns borderless.</p>
        </li>

        <li>
            <p><code>n-colored-th</code> will make the background white and set the text color to the specified brand color.</p>
        </li>
    </ol>

    <h2>Navigation</h2>

    <p>NeatU provides a few helper classes to help you create different types of navigation menus.</p>

    <h3>Basic Hamburger Navigation</h3>

    <p>You can create a basic hamburger menu in NeatU by using the <code>n-navigation</code> class.</p>

    <p>Add the class <code>nav-brand</code> to the main brand link in the navigation.</p>

    <p>Wrap all the navigation links in a <code>div</code> element with the <code>n-navlink-group</code> class.</p>

    <pre><code class="lang-html">&lt;nav class="n-navigation tc-neutral"&gt;
    &lt;a href="https://hellonitish.com" class="nav-brand"&gt;brand&lt;/a&gt;
    &lt;i class="fa-solid fa-bars menu-opener" data-close="fa-bars" data-open="fa-xmark"&gt;&lt;/i&gt;
    &lt;div class="n-navlink-group"&gt;
        &lt;ol&gt;
            &lt;li&gt;&lt;a href=""&gt;Products&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=""&gt;Services&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=""&gt;Contact&lt;/a&gt;&lt;/li&gt;
        &lt;/ol&gt;
    &lt;/div&gt;
&lt;/nav&gt;</code></pre>

    <div class="result n-bshadow n-round">
        <nav class="n-navigation tc-neutral no-pad">
            <a href="https://hellonitish.com" class="nav-brand">brand</a>
            <i class="fa-solid fa-bars menu-opener" data-close="fa-bars" data-open="fa-xmark"></i>
            <div class="n-navlink-group">
                <ol>
                    <li><a href="">Products</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ol>
            </div>
        </nav>
    </div>

    <h4>Use Custom Icons</h4>

    <p>The <code>data-close</code> and <code>data-open</code> attributes on the <code>menu-opener</code> element determine the class to show a closed and open hamburger menu respectively.</p>

    <pre><code class="lang-html">&lt;i class="fa-solid fa-circle-down menu-opener" data-close="fa-circle-down" data-open="fa-circle-up"&gt;&lt;/i&gt;</code></pre>

    <div class="result n-bshadow n-round">
        <nav class="n-navigation tc-ruby no-pad">
            <a href="https://hellonitish.com" class="nav-brand">brand</a>
            <i class="fa-solid fa-circle-down menu-opener" data-close="fa-circle-down" data-open="fa-circle-up"></i>
            <div class="n-navlink-group">
                <ol>
                    <li><a href="">Products</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ol>
            </div>
        </nav>
    </div>


    <h3>Shrinking Hamburger Navigation</h3>

    <p>One thing you might not like about the basic hamburger menu is that it hides all the navigation links behind the hamburger icon at once.</p>

    <p>You might want to gradually add navigation links behind the hamburger icon if they can no longer fit in the available area.</p>

    <p>Add the <code>shrinker</code> class to the navigation to create a shrinking hamburger navigation.</p>

    <p>You will also have to make changes to the navigation structure to accommodate the movement of links.</p>

    <pre><code class="lang-html">&lt;nav id="shrinker-menu" class="n-navigation shrinker tc-mint-success"&gt;
    &lt;a href="https://hellonitish.com" class="nav-brand"&gt;brand&lt;/a&gt;
    &lt;ol&gt;
        &lt;li&gt;&lt;a href=""&gt;Products&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;Services&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;Case Studies&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;Contact&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;About Us&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;Profile&lt;/a&gt;&lt;/li&gt;
    &lt;/ol&gt;
    &lt;i class="fa-solid fa-angles-down menu-opener" data-close="fa-angles-down" data-open="fa-angles-up"&gt;&lt;/i&gt;
    &lt;div class="n-navlink-group"&gt;
        &lt;ol&gt;
        &lt;/ol&gt;
    &lt;/div&gt;
&lt;/nav&gt;</code></pre>

    <div class="result n-round n-bshadow">
        <nav id="shrinker-menu" class="n-navigation shrinker tc-mint-success no-pad">
            <a href="https://hellonitish.com" class="nav-brand">brand</a>
            <ol>
                <li><a href="">Products</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Case Studies</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Profile</a></li>
            </ol>
            <i class="fa-solid fa-angles-down menu-opener" data-close="fa-angles-down" data-open="fa-angles-up"></i>
            <div class="n-navlink-group">
                <ol>
                </ol>
            </div>
        </nav>
    </div>

    <p>As you can see, all the navigation links are originally outside the <code>n-navlink-group</code> element.</p>

    <p>NeatU moves them in or out of the <code>n-navlink-group</code> element based on the available space.</p>

    <h3>Customize the Navigation Menu</h3>

    <p>You can take help from the usual helper classes to add a background, border, or border radius around different elements.</p>

    <p>For instance, use the <code>bg-</code>, <code>bgl-</code>, and <code>bgle-</code> classes to add a background color.</p>

    <p>Use the <code>n-border-</code> classes to add a border and the <code>n-round-</code> classes to get rounded corners.</p>

    <p>I have added two examples for demonstration.</p>

    <pre><code class="lang-html">&lt;nav class="n-navigation tc-ruby bgle-ruby n-round-x2"&gt;</code></pre>

    <div class="result n-bshadow n-round">
        <nav class="n-navigation tc-ruby bgle-ruby n-round-x2">
            <a href="https://hellonitish.com" class="nav-brand">brand</a>
            <i class="fa-solid fa-circle-down menu-opener" data-close="fa-circle-down" data-open="fa-circle-up"></i>
            <div class="n-navlink-group">
                <ol>
                    <li><a href="">Products</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ol>
            </div>
        </nav>
    </div>

    <pre><code class="lang-html">&lt;nav class="n-navigation tc-black bgle-eggplant n-round-x5 n-border-x2"&gt;</code></pre>

    <div class="result n-bshadow n-round">
        <nav id="shrinker-menu-a" class="n-navigation shrinker tc-black bgle-eggplant n-round-x5 n-border-x2">
            <a href="https://hellonitish.com" class="nav-brand">brand</a>
            <ol>
                <li><a href="">Products</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Case Studies</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Profile</a></li>
            </ol>
            <i class="fa-solid fa-angles-down menu-opener" data-close="fa-angles-down" data-open="fa-angles-up"></i>
            <div class="n-navlink-group">
                <ol>
                </ol>
            </div>
        </nav>
    </div>

    <h2>Alerts</h2>

    <p>Alerts cme in handy when you want to display some information to users based on any actions they take.</p>

    <p>You can create an alert with NeatU using the <code>n-alert</code> class like this:</p>

    <pre><code class="lang-html">&lt;div class="n-alert"&gt;&lt;p&gt;A basic alert!&lt;/p&gt;&lt;/div&gt;</code></pre>

    <div class="result n-bshadow n-round">
        <div class="n-alert">
            <p>A basic alert!</p>
        </div>
    </div>

    <h3>Basic Colorful Alerts</h3>

    <p>I set background color for alerts in NeatU with the following CSS:</p>

    <pre><code class="lang-css">background: color-mix(in srgb, currentColor 10%, white);</code></pre>

    <p>This means that you can use the <code>tc-*</code> color classes to set the alert's text color and its background would automatically have a lighter shade of the same color.</p>

    <pre><code class="lang-html">&lt;div class="n-alert tc-neutral"&gt;&lt;p&gt;Hey, this is an informational alert with azure text.&lt;/p&gt;&lt;/div&gt;
&lt;div class="n-alert tc-warning"&gt;&lt;p&gt;Hey, this is a warning alert with orange text.&lt;/p&gt;&lt;/div&gt;
&lt;div class="n-alert tc-success"&gt;&lt;p&gt;Hey, this is a success alert with green text.&lt;/p&gt;&lt;/div&gt;
&lt;div class="n-alert tc-failure"&gt;&lt;p&gt;Hey, this is danger alert with red text.&lt;/p&gt;&lt;/div&gt;
</code></pre>

    <div class="result n-bshadow n-round">
        <div class="n-alert tc-neutral">
            <p>Hey, this is an informational alert with azure text.</p>
        </div>
        <div class="n-alert tc-warning">
            <p>Hey, this is a warning alert with orange text.</p>
        </div>
        <div class="n-alert tc-success">
            <p>Hey, this is a success alert with mint green text.</p>
        </div>
        <div class="n-alert tc-failure">
            <p>Hey, this is danger alert with red text.</p>
        </div>
    </div>

    <h3>Alerts with Borders, Box Shadows and Rounded Corners</h3>

    <p>You can make alerts more stylish by adding one or more helper classes to them.</p>

    <ol>
        <li>
            <p>Use <code>bordered-alert</code> to add a border with the same color as the alert text around the alert.</p>
        </li>
        <li>
            <p>Use <code>n-bshadow</code> to add a white border and a subtle <code>box-shadow</code> around the alert.</p>
        </li>
        <li>
            <p>Use different classes like <code>n-round</code>, <code>n-round-x2</code>, ... ,<code>n-round-x5</code> to add a border radius to the alert.</p>
        </li>
    </ol>

    <p>You can also combine the classes to get try different looks for alerts.</p>

    <pre><code class="lang-html">&lt;div class="n-alert n-border tc-failure"&gt;&lt;p&gt;Hey, this is red alert with border.&lt;/p&gt;&lt;/div&gt;
&lt;div class="n-alert n-border-x2 tc-warning"&gt;&lt;p&gt;Hey, this is brown colored alert with a more prominent border.&lt;/p&gt;&lt;/div&gt;
&lt;div class="n-alert n-outline-x2 tc-dark-cyan"&gt;&lt;p&gt;Hey, alert only has an outline.&lt;/p&gt;&lt;/div&gt;
&lt;div class="n-alert n-round-x3 tc-eggplant"&gt;&lt;p&gt;Hey, this alert is a little round around the corners.&lt;/p&gt;&lt;/div&gt;
&lt;div class="n-alert n-bshadow n-round-x4 tc-mint-success"&gt;&lt;p&gt;Hey, this alert has a subtle box-shadow.&lt;/p&gt;&lt;/div&gt;
</code></pre>

    <div class="result n-bshadow n-rounded">
        <div class="n-alert n-border tc-failure">
            <p>Hey, this is red alert with border.</p>
        </div>
        <div class="n-alert n-border-x2 tc-warning">
            <p>Hey, this is orange colored alert with a more prominent border.</p>
        </div>
        <div class="n-alert n-outline-x2 tc-neutral">
            <p>Hey, this alert only has an outline.</p>
        </div>
        <div class="n-alert n-round-x3 tc-success">
            <p>Hey, this alert is a little round around the corners.</p>
        </div>
        <div class="n-alert n-bshadow n-round-x4 tc-failure">
            <p>Hey, this alert has a subtle box-shadow.</p>
        </div>
    </div>

    <h3>Additional Markup in Alerts</h3>

    <p>Let's say you want to create an alert that has a heading, a link, and a couple of paragraphs.</p>

    <pre><code class="lang-html">&lt;div class="n-alert tcl-neutral s-pad-x8"&gt;
        &lt;h3&gt;Alert Heading!&lt;/h3&gt;
        &lt;hr&gt;
        &lt;p&gt;Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.&lt;/p&gt;
        &lt;p&gt;Hey, this alert is a &lt;a href="#" class="c-inherit"&gt;little round&lt;/a&gt; around the corners.&lt;/p&gt;
        &lt;button class="n-btn tc-white bg-mint-success"&gt;Accept&lt;/button&gt;
        &lt;button class="n-btn tc-white bgl-ruby"&gt;Reject&lt;/button&gt;
    &lt;/div&gt;</code></pre>

    <div class="result n-bshadow n-round">
        <div class="n-alert tcl-neutral s-pad-x8">
            <h3>Alert Heading!</h3>
            <hr>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            <p>Hey, this alert is a <a href="#" class="c-inherit">little round</a> around the corners.</p>
            <button class="n-btn tc-white bgh-success">Accept</button>
            <button class="n-btn tc-white bgh-failure">Reject</button>
        </div>
    </div>

    <h3>Display and Hide Alerts</h3>

    <button class="n-btn tc-mint-success n-opener n-outline-x2 n-outline-hover" data-nu-target="myAlert">Show Alert</button>

    <button class="n-btn tc-ruby n-closer n-outline-x2 n-outline-hover" data-nu-target="myAlert">Hide Alert</button>

    <div id="myAlert" class="n-alert n-outline-x2 tc-warning fade n-outline-hover">
        <p class="n-sflex">You can close me if you like! <i class="fa-solid fa-xmark close-alert n-closer" data-nu-target="myAlert"></i></p>
    </div>

    <p>You can either click the closing icon inside the alert or the dedicated button to close the alert.</p>

    <h3>Create and Destroy Alerts</h3>

    <p>What if you want to create and destroy alerts instead of showing and hiding them?</p>

    <h2>Pagination</h2>

    <p>You can use the <code>pagination</code> class to show paginated links if any piece of content you want to display is spread across multiple pages on your website.</p>

    <p>The elements <code>nav</code>, <code>ul</code>, <code>li</code>, and <code>a</code> are part of the pagination markup in NeatU.</p>

    <pre><code class="lang-html">&lt;nav&gt;
    &lt;ul class="pagination"&gt;
        &lt;li&gt;&lt;a href=""&gt;Previous&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;1&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;3&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;4&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;Next&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;
</code></pre>

    <div class="result n-bshadow n-round">
        <nav>
            <ul class="pagination">
                <li><a href="">Previous</a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">Next</a></li>
            </ul>
        </nav>
    </div>

    <h3>Colorful Pagination Links</h3>

    <p>The text color set on the paginated links determines their background color. Initially, the background is a mix of 15% text color and 85% white.</p>

    <p>You can use helper text color classes with prefixes <code>tch-</code> and <code>tclh-</code> to set the color of paginated links.</p>

    <p>When you use <code>tch-</code> prefixed classes, the paginated links get a much darker background and white text on hover.</p>

    <pre><code class="lang-html">
&lt;nav&gt;
    &lt;ul class="pagination tch-warning"&gt;
        &lt;li&gt;&lt;a href=""&gt;Previous&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;1&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;3&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;4&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;Next&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;
    </code></pre>

    <div class="result n-bshadow n-round">
        <nav>
            <ul class="pagination tch-warning">
                <li><a href="">Previous</a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">Next</a></li>
            </ul>
        </nav>
    </div>

    <p>When you use <code>tclh-</code> prefixed classes, the paginated links get a slightly darker background and black text on hover.</p>

    <pre><code class="lang-html">
&lt;nav&gt;
    &lt;ul class="pagination tclh-warning"&gt;
        &lt;li&gt;&lt;a href=""&gt;Previous&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;1&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;3&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;4&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;Next&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;
    </code></pre>

    <div class="result n-bshadow n-round">
        <nav>
            <ul class="pagination tclh-warning">
                <li><a href="">Previous</a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">Next</a></li>
            </ul>
        </nav>
    </div>

    <h3>Helper Pagination Classes</h3>

    <ol>
        <li>
            <p>Use <code>pag-bordered</code> to add a border around each page link.</p>

            <pre><code class="lang-html">&lt;ul class="pagination pag-bordered tclh-success"&gt;</code></pre>

            <div class="result n-bshadow n-round">
                <nav>
                    <ul class="pagination pag-bordered tclh-success">
                        <li><a href="">Previous</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                </nav>
            </div>
        </li>
        <li>
            <p>Use <code>pag-disjoint</code> to add some space between each link.</p>

            <pre><code class="lang-html">&lt;ul class="pagination pag-disjoint tch-failure"&gt;</code></pre>

            <div class="result n-bshadow n-round">
                <nav>
                    <ul class="pagination pag-disjoint tch-failure">
                        <li><a href="">Previous</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">Next</a></li>
                    </ul>
                </nav>
            </div>
        </li>
    </ol>

    <h3>Pagination Links with Rounded Corners</h3>

    <p>Use classes like <code>nc-rounded</code>, <code>nc-rounded-x2</code>, ... , <code>nc-rounded-x5</code> to add a border radius to all the page links.</p>

    <p>In my opinion, <code>nc-rounded</code> classes work best when used along with <code>pag-disjoint</code>. I have used <code>pag-disjoint</code> and <code>nc-rounded-x3</code> together in the example below for illustration.</p>

    <pre><code class="lang-html">&lt;ul class="pagination pag-disjoint nc-rounded-x3 tch-blue"&gt;</code></pre>

    <div class="result n-bshadow n-round">
        <nav>
            <ul class="pagination pag-disjoint nc-round-x3 tch-neutral">
                <li><a href="">Previous</a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">Next</a></li>
            </ul>
        </nav>
    </div>

    <h3>Mix and Match Classes</h3>

    <p>You can use a combination of <code>pag-disjoint</code>, <code>pag-bordered</code>, <code>tch-</code>, <code>tclh-</code>, and <code>nc-rounded-*</code> classes to get the results you need.</p>

    <pre><code class="lang-html">&lt;ul class="pagination pag-disjoint pag-bordered tch-failure"&gt;</code></pre>

    <div class="result n-bshadow n-round">
        <nav>
            <ul class="pagination pag-disjoint pag-bordered tch-failure">
                <li><a href="">Previous</a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">Next</a></li>
            </ul>
        </nav>
    </div>

    <pre><code class="lang-html">&lt;ul class="pagination pag-disjoint pag-bordered nc-round-x3 tclh-success"&gt;</code></pre>

    <div class="result n-bshadow n-round">
        <nav>
            <ul class="pagination pag-disjoint pag-bordered nc-round-x3 tclh-success">
                <li><a href="">Previous</a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">Next</a></li>
            </ul>
        </nav>
    </div>


    </ol>

    <h3>Disabled and Active Pagination Links</h3>

    <nav>
        <ul class="pagination tclh-neutral">
            <li class="disabled"><a href="">Previous</a></li>
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">Next</a></li>
        </ul>
    </nav>

    <nav>
        <ul class="pagination pag-disjoint pag-bordered tch-warning">
            <li><a href="">Previous</a></li>
            <li class="disabled"><a href="">11</a></li>
            <li><a href="">12</a></li>
            <li><a href="">13</a></li>
            <li class="active"><a href="">14</a></li>
            <li class="disabled"><a href="">Next</a></li>
        </ul>
    </nav>

    <h2>Tabs</h2>

    <p>Developers can use tabs to show a lot of categorized content into limited space while users can go through all that content without scrolling.</p>

    <p>You can create tabs in three different styles in NeatU with slight variation in the markup.</p>

    <p>Let's start with a basic example.</p>

    <pre><code class="lang-html">&lt;ul class="n-tabs n-flex"&gt;
    &lt;li class="active"&gt;&lt;button class="n-btn" data-nu-target="family"&gt;Family&lt;/button&gt;&lt;/li&gt;
    &lt;li&gt;&lt;button class="n-btn" data-nu-target="friends"&gt;Friends&lt;/button&gt;&lt;/li&gt;
    &lt;li&gt;&lt;button class="n-btn" data-nu-target="neighbors"&gt;Neighbors&lt;/button&gt;&lt;/li&gt;
&lt;/ul&gt;</code></pre>

    <p>There are a few noteworthy things in the markup.</p>

    <ol>
        <li>
            <p>Adding the <code>n-tabs</code> class to a <code>ul</code> element will give you bordered tabs.</p>
        </li>
        <li>
            <p>We use the <code>nu-target</code> data attribute to specify what content should show when users click a tab link.</p>
        </li>
        <li>
            <p>The tab links are actually <code>button</code> element with the class <code>n-btn</code>.</p>
        </li>
        <li>
            <p>The parent <code>li</code> tag of the tab <code>button</code> also get an active class when clicked.</p>
        </li>
    </ol>

    <p>Use the following markup for content that goes along with the above tab links.</p>

    <pre><code class="lang-html">&lt;div class="tab-content s-pad-x8 n-border-x2" id="n-tab-content"&gt;
&lt;div class="tab-pane fade show active" id="family" role="tabpanel" aria-labelledby="family-tab"&gt;This is something related to family.&lt;/div&gt;
&lt;div class="tab-pane fade hide" id="friends" role="tabpanel" aria-labelledby="friends-tab"&gt;This is something related to friends.&lt;/div&gt;
&lt;div class="tab-pane fade hide" id="neighbors" role="tabpanel" aria-labelledby="neighbors-tab"&gt;I also have bad neighbors.&lt;/div&gt;
&lt;/div&gt;</code></pre>

    <p>Note the use of <code>tab-content</code> class on the container <code>div</code> element and the <code>tab-pane</code> class for the content of individual tabs.</p>

    <p>The use of <code>id</code> attribute on different <code>div.tab-pane</code> elements helps NeatU identify which tab pane's content it should display.</p>

    <p>The <code>id</code> you specify here should match the value you provided in the <code>nu-target</code> data attribute.</p>

    <div class="result n-round n-bshadow">
        <ul class="n-tabs n-flex">
            <li class="active"><button class="n-btn" data-nu-target="family">Family</button></li>
            <li><button class="n-btn" data-nu-target="friends">Friends</button></li>
            <li><button class="n-btn" data-nu-target="neighbors">Neighbors</button></li>
        </ul>

        <div class="tab-content s-pad-x4 n-border-x2" id="n-tab-content">
            <div class="tab-pane fade show active" id="family" role="tabpanel" aria-labelledby="family-tab">This is something related to family.</div>
            <div class="tab-pane fade hide" id="friends" role="tabpanel" aria-labelledby="friends-tab">This is something related to friends.</div>
            <div class="tab-pane fade hide" id="neighbors" role="tabpanel" aria-labelledby="neighbors-tab">I also have bad neighbors.</div>
        </div>
    </div>

    <h3>Create Horizontal Pill Tabs</h3>

    <p>You can use the <code>n-pills</code> class instead of <code>n-tabs</code> to create tab links with no borders.</p>

    <p>It is possible to specify the background color for the active tab links using background color helper classes like <code>bg-</code>, <code>bgl-</code>, <code>bgh-</code>, and <code>bglh-</code>.</p>

    <p>Use the text color helper classes like <code>tc-</code>, <code>tcl-</code>, <code>tch-</code>, and <code>tclh-</code> to set a text color for the active tab button.</p>

    <p>These classes are set a value for the <code>nu-tab-classes</code> data attribute. NeatU uses JavaScript to toggle these classes for different tab buttons.</p>

    <p>You can also set a background color for the content panes using the <code>bgle-</code> helper classes that provide a very shade of different colors.</p>

    <pre><code class="lang-html">&lt;ul class="n-pills n-flex" data-nu-tab-classes="bg-neutral tc-white"&gt;
    &lt;li class="active"&gt;&lt;button class="n-btn bg-neutral tc-white" data-nu-target="family-b"&gt;Family&lt;/button&gt;&lt;/li&gt;
    &lt;li&gt;&lt;button class="n-btn" data-nu-target="friends-b"&gt;Friends&lt;/button&gt;&lt;/li&gt;
    &lt;li&gt;&lt;button class="n-btn" data-nu-target="neighbors-b"&gt;Neighbors&lt;/button&gt;&lt;/li&gt;
&lt;/ul&gt;</code></pre>

    <div class="result n-round n-bshadow">
        <ul class="n-pills n-flex" data-nu-tab-classes="bg-neutral tc-white">
            <li class="active"><button class="n-btn bg-neutral tc-white" data-nu-target="family-b">Family</button></li>
            <li><button class="n-btn" data-nu-target="friends-b">Friends</button></li>
            <li><button class="n-btn" data-nu-target="neighbors-b">Neighbors</button></li>
        </ul>
        <div class="tab-content bgle-neutral s-pad-x4 s-tb-mar-x2" id="n-tab-content">
            <div class="tab-pane fade show active" id="family-b" role="tabpanel" aria-labelledby="family-tab">This is something related to family.</div>
            <div class="tab-pane fade hide" id="friends-b" role="tabpanel" aria-labelledby="friends-tab">This is something related to friends.</div>
            <div class="tab-pane fade hide" id="neighbors-b" role="tabpanel" aria-labelledby="neighbors-tab">I also have bad neighbors.</div>
        </div>
    </div>



    <h3>Create Vertical Pill Tabs</h3>

    <p>Creating vertical pilled tabs is just a matter of using the <code>n-pills</code> and <code>vertical-pills</code> classes together.</p>

    <pre><code class="lang-html">&lt;ul class="n-pills vertical-pills n-flex n-mw-15" data-nu-tab-classes="bg-warning tc-white"&gt;
    &lt;li class="active"&gt;&lt;button class="n-btn bg-warning tc-white" data-nu-target="family-c"&gt;Family&lt;/button&gt;&lt;/li&gt;
    &lt;li&gt;&lt;button class="n-btn" data-nu-target="friends-c"&gt;Friends&lt;/button&gt;&lt;/li&gt;
    &lt;li&gt;&lt;button class="n-btn" data-nu-target="neighbors-c"&gt;Neighbors&lt;/button&gt;&lt;/li&gt;
&lt;/ul&gt;</code></pre>


    <div class="result n-round n-bshadow">
        <div class="n-flex">
            <ul class="n-pills vertical-pills n-flex n-mw-15" data-nu-tab-classes="bg-warning tc-white">
                <li class="active"><button class="n-btn bg-warning tc-white" data-nu-target="family-c">Family</button></li>
                <li><button class="n-btn" data-nu-target="friends-c">Friends</button></li>
                <li><button class="n-btn" data-nu-target="neighbors-c">Neighbors</button></li>
            </ul>
            <div class="tab-content bgle-warning s-pad-x4 n-mw-85" id="n-tab-content">
                <div class="tab-pane fade show active" id="family-c" role="tabpanel" aria-labelledby="family-tab">This is something related to family.</div>
                <div class="tab-pane fade hide" id="friends-c" role="tabpanel" aria-labelledby="friends-tab">This is something related to friends.</div>
                <div class="tab-pane fade hide" id="neighbors-c" role="tabpanel" aria-labelledby="neighbors-tab">I also have bad neighbors.</div>
            </div>
        </div>
    </div>

    <h3>Use Different Class Combinations</h3>

    <p>You can add rounded corners or borders to the active pill tab by using the <code>n-round-</code> and <code>n-border-</code> helper classes.</p>

    <p>Make sure you add the classes to the <code>na-tab-classes</code> data attribute as that's where NeatU looks for the classes to add to the active tab.</p>

    <div class="result n-round n-bshadow">
        <ul class="n-pills n-flex" data-nu-tab-classes="bgl-success n-border-x2">
            <li class="active"><button class="n-btn bgl-success n-border-x2" data-nu-target="family-b">Family</button></li>
            <li><button class="n-btn" data-nu-target="friends-b">Friends</button></li>
            <li><button class="n-btn" data-nu-target="neighbors-b">Neighbors</button></li>
        </ul>
    </div>

    <div class="result n-round n-bshadow">
        <ul class="n-pills n-flex" data-nu-tab-classes="bglh-failure tc-white n-round-x2">
            <li class="active"><button class="n-btn bglh-failure tc-white n-round-x2" data-nu-target="family-b">Family</button></li>
            <li><button class="n-btn" data-nu-target="friends-b">Friends</button></li>
            <li><button class="n-btn" data-nu-target="neighbors-b">Neighbors</button></li>
        </ul>
    </div>

    <h2>Item Groups</h2>

    <p>Item groups will help you group content items that show related information.</p>

    <h3>Basic Item Group</h3>

    <p>Creating item groups only requires you to add the <code>hrz-group</code> class to the container element.</p>

    <pre><code class="lang-html">&lt;div class="vrt-group sc-pad-x4"&gt;
    &lt;p&gt;Why don't eggs tell jokes?&lt;/p&gt;
    &lt;p&gt;What's orange and sounds like a parrot?&lt;/p&gt;
    &lt;p&gt;Why did the scarecrow win an award?&lt;/p&gt;
    &lt;p&gt;What do you call fake spaghetti?&lt;/p&gt;
&lt;/div&gt;</code></pre>

    <p>I have added an extra <code>sc-pad-x4</code> class to add some padding around each paragraph element.</p>

    <div class="result n-round n-bshadow">
        <div class="vrt-group sc-pad-x4">
            <p>Why don't eggs tell jokes?</p>
            <p>What's orange and sounds like a parrot?</p>
            <p>Why did the scarecrow win an award?</p>
            <p>What do you call fake spaghetti?</p>
        </div>
    </div>

    <p>You could also add another class like <code>n-round-x2</code> to the container element to give rounded corners to the first and last item in the group.</p>

    <div class="result n-round n-bshadow">
        <div class="vrt-group n-round-x4 sc-pad-x4">
            <p>Why don't eggs tell jokes?</p>
            <p>What's orange and sounds like a parrot?</p>
            <p>Why did the scarecrow win an award?</p>
            <p>What do you call fake spaghetti?</p>
        </div>
    </div>

    <h3>Horizontal Item Group</h3>

    <p>Creating a horizontal item group comes in handy when you want to create toolbars for applications like text or image editors.</p>

    <p>The <code>hrz-group</code> class will create a horizontal item group for you.</p>

    <pre><code class="lang-html">&lt;div class="hrz-group n-round"&gt;
    &lt;button class="n-btn"&gt;&lt;i class="fa-regular fa-floppy-disk"&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;button class="n-btn"&gt;&lt;i class="fa-solid fa-rotate-left"&gt;&lt;/i&gt;&lt;/button&gt;
    ... and so on.
&lt;/div&gt;</code></pre>

    <div class="result n-round n-bshadow">
        <div class="hrz-group n-round wd-fit">
            <button class="n-btn"><i class="fa-regular fa-floppy-disk"></i></button><button class="n-btn"><i class="fa-solid fa-rotate-left"></i></button><button class="n-btn"><i class="fa-solid fa-rotate-right"></i></button>
            <button class="n-btn"><i class="fa-solid fa-heading"></i></button><button class="n-btn"><i class="fa-solid fa-paragraph"></i></button><button class="n-btn"><i class="fa-solid fa-link"></i></button>
            <button class="n-btn"><i class="fa-solid fa-italic"></i></button><button class="n-btn"><i class="fa-solid fa-bold"></i></button><button class="n-btn"><i class="fa-solid fa-underline"></i></button>
            <button class="n-btn"><i class="fa-solid fa-spell-check"></i></button>
        </div>
    </div>

    <p>Place multiple <code>.hrz-group</code> elements inside a <code>.n-flex</code> element to create separate item groups.</p>

    <p>You can always use helper text and background color classes to make the toolbars fancier.</p>

    <pre><code class="lang-html">&lt;div class="n-flex n-gap-x4"&gt;
    &lt;div class="hrz-group tc-blue bgle-blue wd-fit"&gt;
        &lt;button class="n-btn"&gt;&lt;i class="fa-regular fa-floppy-disk"&gt;&lt;/i&gt;&lt;/button&gt;
        &lt;button class="n-btn"&gt;&lt;i class="fa-solid fa-rotate-left"&gt;&lt;/i&gt;&lt;/button&gt;
        &lt;button class="n-btn"&gt;&lt;i class="fa-solid fa-rotate-right"&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;/div&gt;
    ... and so on.
&lt;/div&gt;</code></pre>

    <div class="result n-round n-bshadow">
        <div class="n-flex n-gap-x4">

            <div class="hrz-group tc-success bgle-success wd-fit">
                <button class="n-btn"><i class="fa-regular fa-floppy-disk"></i></button><button class="n-btn"><i class="fa-solid fa-rotate-left"></i></button><button class="n-btn"><i class="fa-solid fa-rotate-right"></i></button>
            </div>

            <div class="hrz-group tc-neutral bgle-neutral wd-fit">
                <button class="n-btn"><i class="fa-solid fa-heading"></i></button><button class="n-btn"><i class="fa-solid fa-paragraph"></i></button><button class="n-btn"><i class="fa-solid fa-link"></i></button>
            </div>

            <div class="hrz-group tc-neutral bgle-neutral wd-fit">
                <button class="n-btn"><i class="fa-solid fa-italic"></i></button><button class="n-btn"><i class="fa-solid fa-bold"></i></button><button class="n-btn"><i class="fa-solid fa-underline"></i></button>
            </div>

            <div class="hrz-group tc-success bgle-success wd-fit">
                <button class="n-btn"><i class="fa-solid fa-spell-check"></i></button>
            </div>
        </div>
    </div>

    <h3>Custom Content in Group Items</h3>

    <p>You can add whatever content you like within individual items in an item group.</p>

    <p>In the following example, we are using it to create a to-do list. However, you could do something similar with a contact list or music playlist.</p>

    <pre><code class="lang-html">&lt;ol class="vrt-group sc-pad-x4 tc-slate-blue"&gt;
    &lt;li class="n-flex n-flex-acjsb"&gt;
        &lt;div class="wd-fit detail"&gt;
            &lt;h3&gt;Make Breakfast&lt;/h3&gt;
            &lt;p&gt;Eat something healthy.&lt;/p&gt;
        &lt;/div&gt;
        &lt;span class="wd-fit bg-ruby s-pad-x2 tc-white"&gt;7:00 AM&lt;/span&gt;
    &lt;/li&gt;
    ... and so on.
&lt;/ol&gt;</code></pre>

    <div class="result n-round n-bshadow">
        <ol class="vrt-group sc-pad-x4" data-neat-child-classes="n-flex n-flex-acjsb">
            <li>
                <div class="wd-fit detail">
                    <h3>Make Breakfast</h3>
                    <p>Eat something healthy.</p>
                </div>
                <span class="wd-fit bgl-failure s-pad-x2 n-border-x2">7:00 AM</span>
            </li>
            <li>
                <div class="wd-fit detail">
                    <h3>Study History</h3>
                    <p>Finish the chapter.</p>
                </div>
                <span class="wd-fit bgl-failure s-pad-x2 n-border-x2">9:00 AM</span>
            </li>
            <li>
                <div class="wd-fit detail">
                    <h3>Meet Jack</h3>
                    <p>Get notes from him.</p>
                </div>
                <span class="wd-fit bgl-warning s-pad-x2 n-border-x2">11:00 AM</span>
            </li>
            <li>
                <div class="wd-fit detail">
                    <h3>Go to Market</h3>
                    <p>Buy some vegetables.</p>
                </div>
                <span class="wd-fit bgl-warning s-pad-x2 n-border-x2">04:00 AM</span>
            </li>
            <li>
                <div class="wd-fit detail">
                    <h3>Make Dinner</h3>
                    <p>Cook the vegetables.</p>
                </div>
                <span class="wd-fit bgl-success s-pad-x2 n-border-x2">8:00 PM</span>
            </li>
        </ol>
    </div>


    <script type="module" src="https://cdn.jsdelivr.net/gh/9itish/colorful@main/src/colorful.js"></script>
    <script src="js/neatu.js"></script>
    <script src="js/script.js"></script>
    <script type="module">
        import { Colorful } from 'https://cdn.jsdelivr.net/gh/9itish/colorful@main/src/colorful.js';

        let allGridExamples = document.querySelectorAll("div.n-flex.grid-example");

        for (let gridExample of allGridExamples) {

            let gridChildren = gridExample.querySelectorAll(":scope > div");

            let color = Colorful.getRandomPreferredColor({
                hueRange: [0, 360],
                saturationRange: [70, 80],
                lightnessRange: [85, 90]
            });

            for (let gridChild of gridChildren) {
                if (!(gridChild.hasChildNodes() && gridChild.childElementCount > 0)) {
                    gridChild.style.backgroundColor = color;
                }
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
</body>

</html>