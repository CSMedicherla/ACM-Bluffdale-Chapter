<?php
/*
Template Name: AdaptIndex Blog Post
Description: Dedicated Page template for the AdaptIndex research summary.
             Install:
               1. Copy this file to wp-content/themes/<active-theme>/
               2. WP Admin -> Pages -> Add New
               3. Title: "How a 12 MB Model Picks the Right Vector Index for IoT Workloads"
                  Slug:  adaptindex
               4. Page Attributes -> Template -> "AdaptIndex Blog Post"
               5. Publish.

             NOTE: This makes the post live at /adaptindex/ but it will NOT
             appear on /blog/ — page-blog.php queries the "blog" CATEGORY,
             which only applies to WP Posts, not Pages. If you want both,
             also publish a Post version using blog/adaptindex-post-body.html.
*/
get_header();
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap');

.adaptindex-article {
    --ink: #0a1f44;
    --paper: #fbfaf7;
    --surface: #f4f1eb;
    --accent: #c84a30;
    --accent-soft: #e8d5cb;
    --muted: #5a5a5a;
    --rule: #d4cfc4;

    --font-display: 'Fraunces', Georgia, serif;
    --font-body: 'IBM Plex Sans', system-ui, sans-serif;
    --font-mono: 'IBM Plex Mono', ui-monospace, monospace;

    background: var(--paper);
    color: var(--ink);
    font-family: var(--font-body);
    font-size: 18px;
    line-height: 1.7;
    padding: 80px 24px 120px;
    margin: 0;
}

.adaptindex-article * { box-sizing: border-box; }
.adaptindex-article .container       { max-width: 720px; margin: 0 auto; }
.adaptindex-article .container--wide { max-width: 920px; margin: 0 auto; }

.adaptindex-article .eyebrow {
    display: inline-block;
    font-family: var(--font-mono);
    font-size: 12px; font-weight: 500;
    letter-spacing: 0.18em; text-transform: uppercase;
    color: var(--accent); margin-bottom: 16px;
}

.adaptindex-article .ai-hero {
    max-width: 820px; margin: 0 auto 72px;
    padding-bottom: 48px; border-bottom: 1px solid var(--rule);
}
.adaptindex-article .ai-hero h1 {
    font-family: var(--font-display); font-weight: 600;
    font-size: clamp(36px, 5.5vw, 60px); line-height: 1.1;
    letter-spacing: -0.02em; margin: 0 0 24px; color: var(--ink);
}
.adaptindex-article .ai-hero .dek {
    font-family: var(--font-display); font-weight: 400; font-style: italic;
    font-size: clamp(20px, 2.4vw, 24px); line-height: 1.45;
    color: var(--muted); margin: 0 0 32px; max-width: 640px;
}
.adaptindex-article .byline {
    display: flex; flex-wrap: wrap; gap: 12px 24px;
    font-size: 14px; color: var(--muted);
}
.adaptindex-article .byline strong { color: var(--ink); font-weight: 600; }

.adaptindex-article section { margin: 64px auto; }

.adaptindex-article h2 {
    font-family: var(--font-display); font-weight: 600;
    font-size: clamp(28px, 3.4vw, 36px); line-height: 1.2;
    letter-spacing: -0.01em; color: var(--ink); margin: 0 0 24px;
}
.adaptindex-article h3 {
    font-family: var(--font-body); font-weight: 600;
    font-size: 18px; letter-spacing: 0.01em; color: var(--ink);
    margin: 32px 0 8px;
}
.adaptindex-article p { margin: 0 0 22px; color: #1f2937; }

.adaptindex-article .lead::first-letter {
    font-family: var(--font-display); font-weight: 600;
    font-size: 4.4em; float: left; line-height: 0.85;
    margin: 8px 12px 0 0; color: var(--accent);
}
.adaptindex-article strong { font-weight: 600; color: var(--ink); }

.adaptindex-article ul { padding-left: 0; list-style: none; margin: 0 0 28px; }
.adaptindex-article ul li {
    position: relative; padding-left: 28px;
    margin-bottom: 14px; color: #1f2937;
}
.adaptindex-article ul li::before {
    content: ""; position: absolute; left: 0; top: 0.85em;
    width: 14px; height: 1px; background: var(--accent);
}

.adaptindex-article .pullquote {
    font-family: var(--font-display); font-weight: 400;
    font-size: clamp(24px, 3vw, 32px); line-height: 1.35;
    font-style: italic; color: var(--ink);
    border-left: 3px solid var(--accent);
    padding: 8px 0 8px 32px; margin: 48px 0; max-width: 640px;
}

.adaptindex-article figure { margin: 56px auto; max-width: 880px; }
.adaptindex-article .figure-frame {
    background: var(--surface); border: 1px solid var(--rule);
    border-radius: 4px; padding: 40px 32px 32px; position: relative;
}
.adaptindex-article .figure-frame svg { display: block; width: 100%; height: auto; }
.adaptindex-article figcaption {
    font-family: var(--font-mono); font-size: 13px;
    color: var(--muted); margin-top: 16px;
    line-height: 1.55; letter-spacing: 0.01em;
}
.adaptindex-article figcaption strong {
    color: var(--accent); font-weight: 500; margin-right: 6px;
}

.adaptindex-article .stat-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px;
    background: var(--rule); border: 1px solid var(--rule); margin: 40px 0;
}
.adaptindex-article .stat-cell { background: var(--paper); padding: 28px 20px; text-align: left; }
.adaptindex-article .stat-num {
    font-family: var(--font-display); font-weight: 600;
    font-size: 40px; line-height: 1; color: var(--ink);
    margin-bottom: 6px; letter-spacing: -0.02em;
}
.adaptindex-article .stat-label {
    font-family: var(--font-mono); font-size: 11px;
    letter-spacing: 0.12em; text-transform: uppercase;
    color: var(--muted); line-height: 1.4;
}
@media (max-width: 720px) {
    .adaptindex-article .stat-grid { grid-template-columns: repeat(2, 1fr); }
}

.adaptindex-article .cta {
    background: var(--ink); color: var(--paper);
    padding: 56px 40px; margin: 64px auto 0;
    max-width: 920px; border-radius: 4px;
}
.adaptindex-article .cta .eyebrow { color: var(--accent-soft); }
.adaptindex-article .cta h2 { color: var(--paper); margin-bottom: 16px; }
.adaptindex-article .cta p { color: rgba(251, 250, 247, 0.78); max-width: 560px; }
.adaptindex-article .cta a.button {
    display: inline-block; background: var(--accent); color: var(--paper);
    padding: 14px 28px; text-decoration: none; font-weight: 600;
    font-size: 15px; letter-spacing: 0.02em; border-radius: 2px;
    margin-top: 12px; transition: transform 0.15s ease, background 0.15s ease;
}
.adaptindex-article .cta a.button:hover { background: #a83a25; transform: translateY(-1px); }

.adaptindex-article .cost {
    font-family: var(--font-display); font-weight: 600;
    color: var(--accent); font-size: 1.05em;
}

.adaptindex-article .closing {
    border-top: 1px solid var(--rule); padding-top: 32px;
    margin-top: 80px; font-size: 14px;
    color: var(--muted); font-style: italic; max-width: 720px;
}

.adaptindex-article .featured-hero {
    max-width: 920px; margin: 0 auto 56px;
    border-radius: 4px; overflow: hidden;
    background: var(--surface); border: 1px solid var(--rule);
}
.adaptindex-article .featured-hero svg { display: block; width: 100%; height: auto; }
</style>

<article class="adaptindex-article">

    <div class="featured-hero">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMid meet" role="img" aria-label="AdaptIndex: how a 12 MB model picks the right vector index for IoT workloads">
            <defs>
                <style>
                    .fi-eyebrow    { font: 500 22px 'IBM Plex Mono', ui-monospace, monospace; fill: #c84a30; letter-spacing: 4px; }
                    .fi-brand      { font: 500 16px 'IBM Plex Mono', ui-monospace, monospace; fill: #c84a30; letter-spacing: 3px; }
                    .fi-title      { font: 600 200px 'Fraunces', Georgia, serif; fill: #0a1f44; letter-spacing: -6px; }
                    .fi-dek        { font: italic 400 48px 'Fraunces', Georgia, serif; fill: #5a5a5a; letter-spacing: -0.5px; }
                    .fi-stat-num   { font: 600 60px 'Fraunces', Georgia, serif; fill: #fbfaf7; letter-spacing: -1.5px; }
                    .fi-stat-label { font: 500 13px 'IBM Plex Mono', ui-monospace, monospace; fill: #fbfaf7; opacity: 0.65; letter-spacing: 2px; }
                </style>
            </defs>
            <rect width="1600" height="900" fill="#fbfaf7"/>
            <text x="80" y="100" class="fi-eyebrow">RESEARCH SPOTLIGHT</text>
            <line x1="80" y1="118" x2="260" y2="118" stroke="#c84a30" stroke-width="2"/>
            <text x="1520" y="100" class="fi-brand" text-anchor="end">ACM BLUFFDALE / SLC</text>
            <text x="80" y="330" class="fi-title">AdaptIndex</text>
            <text x="80" y="430" class="fi-dek">How a 12 MB model picks</text>
            <text x="80" y="490" class="fi-dek">the right vector index</text>
            <text x="80" y="550" class="fi-dek">for IoT workloads.</text>
            <g transform="translate(1120, 240)">
                <rect x="0"   y="0"   width="80"  height="40" fill="none" stroke="#d4cfc4" stroke-width="1.5" rx="2"/>
                <rect x="0"   y="55"  width="80"  height="40" fill="none" stroke="#d4cfc4" stroke-width="1.5" rx="2"/>
                <rect x="0"   y="110" width="80"  height="40" fill="none" stroke="#d4cfc4" stroke-width="1.5" rx="2"/>
                <line x1="80" y1="20"  x2="160" y2="75" stroke="#c84a30" stroke-width="1.5"/>
                <line x1="80" y1="75"  x2="160" y2="75" stroke="#c84a30" stroke-width="1.5"/>
                <line x1="80" y1="130" x2="160" y2="75" stroke="#c84a30" stroke-width="1.5"/>
                <rect x="160" y="50"  width="120" height="50" fill="#0a1f44" rx="2"/>
                <text x="220" y="82" text-anchor="middle" fill="#fbfaf7" style="font: 500 14px 'IBM Plex Sans', system-ui, sans-serif; letter-spacing: 0.5px;">GBDT</text>
                <line x1="280" y1="75" x2="360" y2="40"  stroke="#c84a30" stroke-width="1.5"/>
                <line x1="280" y1="75" x2="360" y2="75"  stroke="#c84a30" stroke-width="1.5"/>
                <line x1="280" y1="75" x2="360" y2="110" stroke="#c84a30" stroke-width="1.5"/>
                <rect x="360" y="20"  width="100" height="40" fill="none" stroke="#c84a30" stroke-width="2" rx="2"/>
                <rect x="360" y="65"  width="100" height="40" fill="none" stroke="#d4cfc4" stroke-width="1.5" rx="2"/>
                <rect x="360" y="110" width="100" height="40" fill="none" stroke="#d4cfc4" stroke-width="1.5" rx="2"/>
                <text x="410" y="46"  text-anchor="middle" fill="#c84a30" style="font: 600 13px 'IBM Plex Sans', system-ui, sans-serif; letter-spacing: 0.5px;">HNSW</text>
                <text x="410" y="91"  text-anchor="middle" fill="#0a1f44" opacity="0.55" style="font: 500 12px 'IBM Plex Sans', system-ui, sans-serif; letter-spacing: 0.5px;">IVF-FLAT</text>
                <text x="410" y="136" text-anchor="middle" fill="#0a1f44" opacity="0.55" style="font: 500 12px 'IBM Plex Sans', system-ui, sans-serif; letter-spacing: 0.5px;">Hybrid</text>
            </g>
            <rect x="0" y="700" width="1600" height="200" fill="#0a1f44"/>
            <line x1="0" y1="700" x2="1600" y2="700" stroke="#c84a30" stroke-width="2"/>
            <text x="100" y="790" class="fi-stat-num">12 MB</text>
            <text x="100" y="830" class="fi-stat-label">MODEL SIZE</text>
            <line x1="400" y1="740" x2="400" y2="860" stroke="#c84a30" stroke-width="1" opacity="0.35"/>
            <text x="420" y="790" class="fi-stat-num">&lt; 5 ms</text>
            <text x="420" y="830" class="fi-stat-label">INFERENCE</text>
            <line x1="800" y1="740" x2="800" y2="860" stroke="#c84a30" stroke-width="1" opacity="0.35"/>
            <text x="820" y="790" class="fi-stat-num">&#x2212;29%</text>
            <text x="820" y="830" class="fi-stat-label">P95 LATENCY</text>
            <line x1="1200" y1="740" x2="1200" y2="860" stroke="#c84a30" stroke-width="1" opacity="0.35"/>
            <text x="1220" y="790" class="fi-stat-num">89%</text>
            <text x="1220" y="830" class="fi-stat-label">PREDICTION ACCURACY</text>
        </svg>
    </div>

    <header class="ai-hero">
        <span class="eyebrow">Research Spotlight</span>
        <h1>How a 12 MB Model Picks the Right Vector Index for IoT Workloads</h1>
        <p class="dek">A walkthrough of recently published research on adaptive index selection in vector databases, evaluated across four benchmark datasets and a large-scale simulation study.</p>
        <div class="byline">
            <span>By <strong>Chandrashekhar M</strong></span>
            <span>May 16, 2026</span>
            <span>7 min read</span>
        </div>
    </header>

    <section class="container">
        <span class="eyebrow">The Problem</span>
        <h2>When the Wrong Index Costs Millions</h2>

        <p class="lead">A retailer lost <span class="cost">$340,000</span> during a Black Friday rush when its similarity-search service ran out of memory mid-checkout. A manufacturer absorbed a <span class="cost">$2.1 million</span> hit because its anomaly-detection pipeline missed defects. Recall was too low for the workload it was actually serving. Different industries, different failure modes, same underlying cause. Somebody picked the wrong vector index.</p>

        <p>Vector databases now power a remarkable amount of critical infrastructure: smart-city sensor search, industrial monitoring, real-time product retrieval, retrieval-augmented LLMs. The choice of index structure is the single biggest lever determining whether such a system stays up under load. Today, that lever gets pulled by a human expert. Once. Often months before the workload it will actually face.</p>

        <p>That does not scale. The two failures above are what it looks like when it breaks.</p>
    </section>

    <figure>
        <div class="figure-frame">
            <svg viewBox="0 0 800 360" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Comparison of three vector index types">
                <defs>
                    <style>
                        .axis-label { font: 500 12px 'IBM Plex Mono', monospace; fill: #5a5a5a; letter-spacing: 0.08em; }
                        .index-name { font: 600 16px 'IBM Plex Sans', sans-serif; fill: #0a1f44; }
                        .index-tag  { font: 500 11px 'IBM Plex Mono', monospace; fill: #5a5a5a; letter-spacing: 0.08em; }
                    </style>
                </defs>
                <text x="240" y="32" class="axis-label" text-anchor="middle">MEMORY EFFICIENCY</text>
                <text x="460" y="32" class="axis-label" text-anchor="middle">RECALL</text>
                <text x="680" y="32" class="axis-label" text-anchor="middle">LATENCY</text>
                <text x="40" y="100" class="index-name">HNSW</text>
                <text x="40" y="118" class="index-tag">Graph-based</text>
                <rect x="180" y="92" width="120" height="14" fill="#e8d5cb" />
                <rect x="180" y="92" width="32"  height="14" fill="#c84a30" />
                <rect x="400" y="92" width="120" height="14" fill="#e8d5cb" />
                <rect x="400" y="92" width="108" height="14" fill="#0a1f44" />
                <rect x="620" y="92" width="120" height="14" fill="#e8d5cb" />
                <rect x="620" y="92" width="105" height="14" fill="#0a1f44" />
                <text x="40" y="180" class="index-name">IVF-FLAT</text>
                <text x="40" y="198" class="index-tag">Partition-based</text>
                <rect x="180" y="172" width="120" height="14" fill="#e8d5cb" />
                <rect x="180" y="172" width="100" height="14" fill="#0a1f44" />
                <rect x="400" y="172" width="120" height="14" fill="#e8d5cb" />
                <rect x="400" y="172" width="74"  height="14" fill="#0a1f44" />
                <rect x="620" y="172" width="120" height="14" fill="#e8d5cb" />
                <rect x="620" y="172" width="78"  height="14" fill="#0a1f44" />
                <text x="40" y="260" class="index-name">Hybrid</text>
                <text x="40" y="278" class="index-tag">Graph + partition</text>
                <rect x="180" y="252" width="120" height="14" fill="#e8d5cb" />
                <rect x="180" y="252" width="72"  height="14" fill="#0a1f44" />
                <rect x="400" y="252" width="120" height="14" fill="#e8d5cb" />
                <rect x="400" y="252" width="96"  height="14" fill="#0a1f44" />
                <rect x="620" y="252" width="120" height="14" fill="#e8d5cb" />
                <rect x="620" y="252" width="90"  height="14" fill="#0a1f44" />
                <line x1="40" y1="320" x2="760" y2="320" stroke="#d4cfc4" stroke-width="1"/>
                <text x="40" y="345" class="axis-label">LOW</text>
                <text x="760" y="345" class="axis-label" text-anchor="end">HIGH</text>
            </svg>
        </div>
        <figcaption><strong>Figure 1.</strong> Each index type optimizes for a different combination of memory, recall, and latency. The "right" choice depends on which dimension your workload pressures most, and that pressure shifts over time.</figcaption>
    </figure>

    <section class="container">
        <span class="eyebrow">Background</span>
        <h2>Three Indexes, Three Trade-offs</h2>

        <p>Vector indexes are not interchangeable. Each makes different compromises.</p>

        <ul>
            <li><strong>HNSW</strong> (Hierarchical Navigable Small World) is graph-based. It delivers excellent recall and low latency, but its memory footprint can be several times the raw vector size. That is dangerous when memory budgets are tight.</li>
            <li><strong>IVF-FLAT</strong> (Inverted File with Flat encoding) partitions vectors into clusters and scans only a subset at query time. It uses far less memory, but recall is sensitive to tuning and to distribution shift.</li>
            <li><strong>Hybrid</strong> schemes combine partitioning with in-partition graph search, trying to balance the two, at the cost of more configuration surface.</li>
        </ul>

        <p>Pick HNSW for a memory-constrained edge gateway and you may exhaust RAM under a query spike. Pick IVF-FLAT for an anomaly-detection workload that needs near-perfect recall on rare patterns and you may miss the very events you deployed the system to catch. Either choice can be defensible at design time and catastrophic at 3 a.m. on Black Friday.</p>

        <p>The deeper issue is that workloads are not stationary. Query rates shift with diurnal patterns. New sensors come online and change the data distribution. Batch sizes vary as upstream services adapt. A static choice, however expertly made, is a snapshot of a moving target.</p>

        <div class="pullquote">
            "A static choice, however expertly made, is a snapshot of a moving target."
        </div>
    </section>

    <section class="container">
        <span class="eyebrow">The Approach</span>
        <h2>Let the System Pick Its Own Index</h2>

        <p>AdaptIndex is built on a straightforward premise. If a human expert can pick the right index after inspecting a system's workload, a model trained on enough of those decisions can too. And it can keep picking, continuously, as the workload evolves.</p>

        <p>The system extracts <strong>18 features</strong> across three families that, together, describe the state of any vector-search deployment:</p>

        <ul>
            <li><strong>Query-pattern features:</strong> request rate, batch size, temporal peaks, and other indicators of how the system is being used.</li>
            <li><strong>Data-distribution features:</strong> dimensionality, clustering structure, sparsity, and other characteristics of the indexed corpus itself.</li>
            <li><strong>Performance-signal features:</strong> observed latency, memory pressure, cache behavior, and other runtime telemetry that reflects how the current configuration is coping.</li>
        </ul>

        <p>A gradient-boosting classifier maps that feature vector to a recommended index configuration. Gradient boosting was deliberate. It trains on modest data, runs fast at inference, and surfaces feature importances that a human operator can actually interpret when the system reconfigures itself.</p>

        <p>The design constraints were aggressive on purpose:</p>

        <ul>
            <li>Fit on edge hardware. The model is <strong>12 MB</strong> on disk.</li>
            <li>Decide fast enough not to become the bottleneck. Inference runs in <strong>under 5 milliseconds</strong>.</li>
            <li>Generalize across workloads not seen during training.</li>
        </ul>

        <p>Those three constraints rule out a lot of fashionable ML choices. They turned out not to be limiting in practice.</p>
    </section>

    <figure>
        <div class="figure-frame">
            <svg viewBox="0 0 880 380" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="AdaptIndex pipeline diagram">
                <defs>
                    <style>
                        .box-title    { font: 600 13px 'IBM Plex Sans', sans-serif; fill: #0a1f44; }
                        .box-item     { font: 400 12px 'IBM Plex Sans', sans-serif; fill: #1f2937; }
                        .box-label    { font: 500 10px 'IBM Plex Mono', monospace; fill: #5a5a5a; letter-spacing: 0.1em; }
                        .stage-label  { font: 500 11px 'IBM Plex Mono', monospace; fill: #c84a30; letter-spacing: 0.12em; }
                        .model-title  { font: 600 15px 'IBM Plex Sans', sans-serif; fill: #fbfaf7; }
                        .model-spec   { font: 500 11px 'IBM Plex Mono', monospace; fill: #fbfaf7; letter-spacing: 0.05em; }
                        .output-name  { font: 600 14px 'IBM Plex Sans', sans-serif; fill: #0a1f44; }
                        .selected     { font: 600 14px 'IBM Plex Sans', sans-serif; fill: #c84a30; }
                    </style>
                </defs>
                <text x="120" y="28" class="stage-label" text-anchor="middle">01 / FEATURES</text>
                <text x="445" y="28" class="stage-label" text-anchor="middle">02 / MODEL</text>
                <text x="770" y="28" class="stage-label" text-anchor="middle">03 / DECISION</text>
                <rect x="20" y="50" width="200" height="86" fill="#fbfaf7" stroke="#d4cfc4" stroke-width="1" rx="2"/>
                <text x="36" y="74" class="box-label">QUERY PATTERNS</text>
                <text x="36" y="94" class="box-item">request rate</text>
                <text x="36" y="110" class="box-item">batch size</text>
                <text x="36" y="126" class="box-item">temporal peaks</text>
                <rect x="20" y="148" width="200" height="86" fill="#fbfaf7" stroke="#d4cfc4" stroke-width="1" rx="2"/>
                <text x="36" y="172" class="box-label">DATA DISTRIBUTION</text>
                <text x="36" y="192" class="box-item">dimensionality</text>
                <text x="36" y="208" class="box-item">clustering</text>
                <text x="36" y="224" class="box-item">sparsity</text>
                <rect x="20" y="246" width="200" height="86" fill="#fbfaf7" stroke="#d4cfc4" stroke-width="1" rx="2"/>
                <text x="36" y="270" class="box-label">PERFORMANCE</text>
                <text x="36" y="290" class="box-item">latency</text>
                <text x="36" y="306" class="box-item">memory pressure</text>
                <text x="36" y="322" class="box-item">cache behavior</text>
                <path d="M 220 93 L 340 175" stroke="#c84a30" stroke-width="1.2" fill="none"/>
                <path d="M 220 191 L 340 191" stroke="#c84a30" stroke-width="1.2" fill="none"/>
                <path d="M 220 289 L 340 207" stroke="#c84a30" stroke-width="1.2" fill="none"/>
                <rect x="340" y="140" width="210" height="100" fill="#0a1f44" rx="2"/>
                <text x="445" y="170" class="model-title" text-anchor="middle">Gradient Boosting</text>
                <text x="445" y="190" class="model-title" text-anchor="middle">Classifier</text>
                <line x1="370" y1="206" x2="520" y2="206" stroke="#c84a30" stroke-width="1"/>
                <text x="445" y="223" class="model-spec" text-anchor="middle">12 MB &middot; &lt; 5 ms</text>
                <text x="280" y="200" class="box-label" text-anchor="middle">18</text>
                <path d="M 550 190 L 660 130" stroke="#c84a30" stroke-width="1.2" fill="none"/>
                <path d="M 550 190 L 660 190" stroke="#c84a30" stroke-width="1.2" fill="none"/>
                <path d="M 550 190 L 660 250" stroke="#c84a30" stroke-width="1.2" fill="none"/>
                <rect x="660" y="105" width="180" height="50" fill="#fbfaf7" stroke="#c84a30" stroke-width="2" rx="2"/>
                <text x="750" y="135" class="selected" text-anchor="middle">HNSW  &larr; selected</text>
                <rect x="660" y="165" width="180" height="50" fill="#fbfaf7" stroke="#d4cfc4" stroke-width="1" rx="2"/>
                <text x="750" y="195" class="output-name" text-anchor="middle">IVF-FLAT</text>
                <rect x="660" y="225" width="180" height="50" fill="#fbfaf7" stroke="#d4cfc4" stroke-width="1" rx="2"/>
                <text x="750" y="255" class="output-name" text-anchor="middle">Hybrid</text>
            </svg>
        </div>
        <figcaption><strong>Figure 2.</strong> The AdaptIndex pipeline. Eighteen features across three families feed a small gradient-boosting classifier, which outputs the optimal index choice for the current workload. The whole loop fits in 12 MB and runs in under 5 ms, making it deployable on edge gateways.</figcaption>
    </figure>

    <section class="container">
        <span class="eyebrow">Evaluation</span>
        <h2>Benchmarks</h2>

        <p>We evaluated AdaptIndex on four datasets:</p>

        <ul>
            <li><strong>SIFT1M</strong> and <strong>GIST1M</strong>, standard ANN benchmarks that let other researchers reproduce results.</li>
            <li><strong>Synthetic-IoT</strong>, a synthetic workload designed to model IoT query patterns.</li>
            <li><strong>Production-Edge</strong>, an edge-deployment trace.</li>
        </ul>

        <p>Against the best static configuration on each dataset, AdaptIndex delivered <strong>23 to 31 percent latency improvement</strong>, with <strong>89 percent prediction accuracy</strong> on the correct index choice. The accuracy number is worth pausing on. Even when the model picked a sub-optimal index, the cost of being wrong was generally small, because the second-best choice in any given regime is rarely catastrophic. The catastrophic choices are the ones the model learns to avoid first.</p>
    </section>

    <figure>
        <div class="figure-frame">
            <svg viewBox="0 0 800 320" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Latency improvement chart">
                <defs>
                    <style>
                        .bar-label  { font: 500 12px 'IBM Plex Mono', monospace; fill: #5a5a5a; letter-spacing: 0.08em; }
                        .bar-value  { font: 600 18px 'IBM Plex Sans', sans-serif; fill: #0a1f44; }
                        .bar-tag    { font: 500 11px 'IBM Plex Mono', monospace; fill: #c84a30; letter-spacing: 0.1em; }
                        .axis       { stroke: #d4cfc4; stroke-width: 1; }
                        .axis-text  { font: 500 11px 'IBM Plex Mono', monospace; fill: #5a5a5a; letter-spacing: 0.08em; }
                    </style>
                </defs>
                <text x="40" y="32" class="bar-tag">LATENCY (NORMALIZED)</text>
                <line x1="170" y1="60" x2="170" y2="260" class="axis"/>
                <text x="155" y="65" class="axis-text" text-anchor="end">100%</text>
                <text x="155" y="160" class="axis-text" text-anchor="end">50%</text>
                <text x="155" y="265" class="axis-text" text-anchor="end">0%</text>
                <rect x="200" y="60" width="120" height="200" fill="#e8d5cb"/>
                <rect x="200" y="60" width="120" height="200" fill="none" stroke="#c84a30" stroke-width="1"/>
                <text x="260" y="285" class="bar-label" text-anchor="middle">STATIC BASELINE</text>
                <text x="260" y="50" class="bar-value" text-anchor="middle">100%</text>
                <rect x="370" y="122" width="120" height="138" fill="#0a1f44"/>
                <rect x="370" y="106" width="120" height="16" fill="#0a1f44" fill-opacity="0.25"/>
                <text x="430" y="285" class="bar-label" text-anchor="middle">ADAPTINDEX (BENCH)</text>
                <text x="430" y="50" class="bar-value" text-anchor="middle">69&ndash;77%</text>
                <text x="430" y="118" class="bar-tag" text-anchor="middle">&minus;23 to &minus;31%</text>
                <rect x="540" y="118" width="120" height="142" fill="#0a1f44"/>
                <text x="600" y="285" class="bar-label" text-anchor="middle">ADAPTINDEX (SIM P95)</text>
                <text x="600" y="50" class="bar-value" text-anchor="middle">71%</text>
                <text x="600" y="111" class="bar-tag" text-anchor="middle">&minus;29%</text>
                <line x1="170" y1="60" x2="690" y2="60" stroke="#d4cfc4" stroke-dasharray="2,4" stroke-width="1"/>
            </svg>
        </div>
        <figcaption><strong>Figure 3.</strong> Across four benchmark datasets, AdaptIndex reduced latency by 23 to 31 percent versus the best static configuration. In a 90-day simulation at deployment scale, P95 latency dropped by 29 percent.</figcaption>
    </figure>

    <section class="container">
        <span class="eyebrow">At Scale</span>
        <h2>A Larger Simulation Study</h2>

        <p>Benchmarks on small datasets are necessary but not sufficient. To test how AdaptIndex behaves under realistic deployment variation, we ran a larger simulation study.</p>

        <p>The simulation modeled <strong>47 edge gateways across 12 geographic regions</strong>, processing roughly <strong>5 million queries per day for 90 simulated days</strong>. The setup intentionally varied hardware profiles, network conditions, and workload mix so the results would not be artifacts of a single configuration.</p>

        <div class="stat-grid">
            <div class="stat-cell"><div class="stat-num">47</div><div class="stat-label">Modeled gateways</div></div>
            <div class="stat-cell"><div class="stat-num">12</div><div class="stat-label">Regions modeled</div></div>
            <div class="stat-cell"><div class="stat-num">5M</div><div class="stat-label">Daily queries (sim.)</div></div>
            <div class="stat-cell"><div class="stat-num">90</div><div class="stat-label">Simulated days</div></div>
            <div class="stat-cell"><div class="stat-num">29%</div><div class="stat-label">P95 latency reduction</div></div>
            <div class="stat-cell"><div class="stat-num">99.2%</div><div class="stat-label">Simulated uptime</div></div>
            <div class="stat-cell"><div class="stat-num">89%</div><div class="stat-label">Prediction accuracy</div></div>
            <div class="stat-cell"><div class="stat-num">0</div><div class="stat-label">Index-related failures</div></div>
        </div>

        <p>The paper includes the full simulation breakdown, region by region and workload by workload, for readers who want to see where the model worked best and where it had the most to learn.</p>
    </section>

    <section class="container">
        <span class="eyebrow">Implications</span>
        <h2>What We Take Away</h2>

        <p>Two things stand out.</p>

        <h3>For practitioners</h3>
        <p>If you operate a vector database under any kind of variable workload (and "variable" describes essentially every IoT and recommendation use case), the cost of a static index choice quietly accumulates. AdaptIndex shows that a deployable, lightweight system can recover most of that cost without an expert in the loop and without a heavyweight ML pipeline shadowing your query path.</p>

        <h3>For the field</h3>
        <p>A small model with good features can beat a large model with poor ones, even in systems work where ML is often viewed with skepticism. A 12 MB and 5 ms envelope is small enough that the deployment conversation is short. That envelope is itself a contribution. We hope it encourages others to treat "lightweight enough to ship at the edge" as a first-class design constraint, not an afterthought.</p>
    </section>

    <div class="container--wide">
        <div class="cta">
            <span class="eyebrow">Read the paper</span>
            <h2>Get the full details</h2>
            <p>The paper covers everything not in this post: full feature definitions, training procedure, dataset construction, model-selection rationale, ablation studies, and the detailed simulation setup that did not fit into an abstract.</p>
            <a class="button" href="https://www.researchgate.net/publication/403637613_AdaptIndex_Adaptive_Index_Selection_for_IoT_Vector_Databases" target="_blank" rel="noopener noreferrer">
                Read AdaptIndex on ResearchGate &nbsp;&rarr;
            </a>
        </div>
    </div>

    <div class="container">
        <p class="closing">
            By <strong>Chandrashekhar M</strong>, Vice Chair. Written for the Bluffdale ACM Chapter Blog. Have a topic you'd like to write about? Reach out to us at <a href="https://bluffdale.acm.org/contact">bluffdale.acm.org/contact</a>.
        </p>
    </div>

</article>

<?php get_footer(); ?>
