# PMPro Membership Site Types and Use Cases

Reference for development planning, design decisions, and public documentation. Use this alongside the [Donna audience profile](#donna-the-target-audience) to make decisions about feature scope, page patterns, and UX priorities.

---

## Donna: The Target Audience

Donna is the Memberlite target user. She chose Memberlite because it works with Paid Memberships Pro without requiring developer help.

- Self-sufficient by choice. She would rather spend a weekend learning the Customizer than pay a developer to change her header color.
- Follows instructions; does not invent solutions. She can navigate Appearance > Customize, copy a CSS snippet into her child theme stylesheet, and activate a plugin. She cannot debug a broken template, read a PHP error, or write CSS from scratch.
- Visual and outcome-oriented. She cares about what her site looks like to members, not how the theme works internally.
- Building in iterations. Get-it-working steps come first; optional refinements come after.
- Trusts exact documentation. Vague directions lose her; precise paths and labeled steps earn her confidence.

---

## The 8 PMPro Membership Site Types

### 1. Association / NPO

The most structured of the eight. Think professional trade organizations, hobby clubs, non-profits, alumni groups, HOAs, condo associations, sports leagues. The defining trait is dues + member management: people are members of an organization, not just subscribers to content.

**Self-ID question:** "Are people members of an organization, not just subscribers to my content?"

**Real examples:**
- Regional nursing association collecting annual dues
- Local swim club or community pool (sells family/individual memberships, day passes)
- Condo HOA or volunteer fire department booster club
- Alumni group

**Real Memberlite sites:**
- **LERA Chapter** — Hub-and-spoke network: lerachapter.org acts as directory and umbrella, each regional chapter (Detroit LERA, Chicago LERA, etc.) runs its own sub-site with shared Memberlite visual DNA. This is the network/franchise pattern — consistent branding across dozens of independent installs.
- **Sheldon Family Association** — Genealogy society in its 87th year. Members get: family tree database access, quarterly newsletter archive, gated publications, a directory, and event registration. Classic dues-paying-member model.
- **Fieldale Pools** — Community pool in rural Virginia. Sells individual/family memberships, day passes, court reservations (pickleball), swim lessons, and event rentals. Very local, very utilitarian. The "small community org that just needs it to work" use case.

---

### 2. Blog / News

Content-first sites moving away from ads toward reader-supported subscriptions. The gating model varies: some gate everything, some offer a free tier with premium content behind a paywall. Often overlaps with newsletters.

**Self-ID question:** "Am I primarily a writer or publisher trying to monetize my content archive?"

**Real examples:**
- Niche industry newsletter with a web archive
- Independent local news outlet
- Financial analysis blog
- Sports commentary site

---

### 3. Community

The interaction is the product. Less about content, more about connecting people to each other — forums, groups, messaging, activity feeds. Often combined with another site type (a course site that also has forums, for example).

**Self-ID question:** "Would members keep paying even if I stopped publishing new content, just because of the people they can connect with?"

**Real examples:**
- Niche hobbyist forum (vintage cameras, sourdough baking)
- Local parents' group
- Professional peer network
- Fan community

---

### 4. Courses / Coaching

Structured learning with a clear transformation arc. Not just "here is content" but "here is a path from A to B." Includes 1:1 coaching access, cohort programs, and drip-released curricula.

**Self-ID question:** "Is there a clear beginning-to-end learning journey, or do I coach people toward a specific outcome?"

**Real Memberlite sites:**
- **Six Sigma Study Guide** — One person (Ted Hessing) providing test prep for Six Sigma certifications (Yellow/Green/Black Belt). Free tier to hook visitors, paid tier for practice exams and deep study materials. Classic one-person expert site.
- **PWN Test Prep** — SAT/digital SAT prep by Mike. Books plus a Q&A blog where reader questions are answered publicly. Educator-as-personality model, community feel.
- **UkeSchool** (Dutch) — Online ukulele school with four structured levels (Beginner to Expert), seasonal lesson cycles (~36 lessons/season), a community component, and live "play days." Lifetime membership option alongside subscription. Runs entirely in Dutch — demonstrates Memberlite works fine for non-English sites.
- **José Enrique** — Spanish-language IT and office software training for civil service exam prep ("oposiciones"). Same pattern as Six Sigma and PWN: one expert, structured courses, certification focus.

---

### 5. Directory / Listings

The membership unlocks visibility or access to a searchable database. Either members pay to be listed, or members pay to search and access the list. The directory is the core value.

**Self-ID question:** "Is the primary value either being findable by others, or being able to find others?"

**Real examples:**
- Vetted contractor marketplace
- Local business directory
- Therapist finder
- Wedding vendor directory
- Professional registry
- Real estate agent network

---

### 6. Paid Newsletter

Email-first, with the website as a secondary archive. The member relationship is built in the inbox. Often overlaps with Blog/News but the delivery mechanism is different: subscribers expect their value in their email, not by logging in.

**Self-ID question:** "Would my members be happy if the website disappeared entirely and they only got emails?"

**Real examples:**
- Weekly stock picks letter
- Curated industry digest
- Personal finance advice newsletter
- Parenting tips series

---

### 7. Podcast

The audio is the product. Memberships unlock private or bonus episodes, early access, ad-free feeds, or exclusive RSS access. The public feed is the marketing engine; the membership monetizes superfans.

**Self-ID question:** "Do I publish a podcast, and is the audio itself the primary thing members are paying for?"

**Real examples:**
- True crime show with bonus deep-dives for supporters
- Business interview podcast with an ad-free member tier
- Baseball Prospectus (actual PMPro customer) using podcast as one content channel among many

---

### 8. Private Video

Video is the product, but it lives on your site — not YouTube. Think Vimeo-hosted or Bunny.net video libraries gated behind a membership. Closer to a streaming service model than a course.

**Self-ID question:** "Is my content primarily video, and do I want full control over who can watch it?"

**Real examples:**
- Fitness instructor with a workout video library
- Cooking channel with recipe videos
- Film critic with a screening archive
- School Tools TV (actual PMPro example)

---

### Edge Cases

- **Pool / swim club memberships** → Association (dues-paying members of an organization, not content subscribers)
- **Study guide / test prep** → Courses (structured path to a clear outcome); tips toward Community if peer discussion is the primary value
- **Sites that combine types** are common. The type reflects the primary value proposition, not every feature on the site.

---

## Essential Pages by Site Type

### Universal PMPro Pages (every site)

Every PMPro install needs these pages regardless of site type:

- **Membership Levels** — the pricing/plans page
- **Checkout** — the purchase flow
- **Account** — member dashboard (login, billing, cancel)
- **Invoice** — post-purchase confirmation
- **Billing** — update payment info
- **Cancel** — membership cancellation confirmation

Everything below is on top of these.

---

### Association / NPO

High page count, lots of navigation. These sites feel like mini-portals.

- **Homepage** — public-facing, mission statement + join CTA; often has event teasers and social proof (member count, years in operation)
- **Member Directory** — the #1 value prop for most associations
- **Events listing + single event** — often critical, especially for local and regional groups
- **Resources / Publications archive** — gated content library (newsletters, reports, PDFs)
- **About / Board of Directors** — legitimacy page, especially for trade organizations
- **Member login / dashboard** — "members only" destination with links to all gated areas
- **Application / Join page** — sometimes separate from the Levels page when there is an approval workflow

---

### Courses / Certification Prep

Funnel-heavy. The homepage is the main sales page.

- **Homepage / Sales page** — hero + testimonials + "what you get" breakdown
- **Course / content index** — gated table of contents or curriculum overview
- **Single lesson / post** — the primary content template (most visits land here)
- **Progress or "Start Here" page** — onboarding destination after checkout
- **Testimonials / Results page** — social proof, often its own page
- **Free sample / preview page** — a few unlocked lessons to build trust before purchase

---

### Community

The logged-in experience is the whole product.

- **Homepage** — logged-out: sell the community; logged-in: redirect to dashboard or feed (Member Homepages add-on pattern)
- **Activity feed / Forum index** — the "town square"
- **Member profile page** — who is in the community
- **Member directory**
- **Single discussion / thread**
- **Groups** (if using BuddyPress Groups)
- **Join / Levels page** — often just one tier ("become a member")

---

### Paid Newsletter

Minimal page count. The email is the product; the site is the archive and subscribe flow.

- **Homepage** — subscribe CTA + recent issue previews
- **Archive / Past issues index** — gated
- **Single issue** — the primary content template
- **About the author** — credibility and personality page (almost always one person)
- **Free sample issue** — to convert visitors

---

### Podcast

- **Homepage** — latest episode + subscribe CTA
- **Episodes archive** — public titles, gated audio or transcripts
- **Single episode** — audio embed + show notes (two versions: public teaser, member full)
- **About / Host page**
- **Become a supporter / Levels page**

---

### Private Video

Closest to a streaming service UX.

- **Homepage** — trailer or preview + join CTA
- **Video library / catalog** — gated, browseable
- **Single video** — the primary template (video embed + description)
- **Categories / Series** — navigation layer for large catalogs
- **Member dashboard** — "continue watching" or curated picks

---

### Directory / Listings

Two sub-patterns: pay to be listed vs. pay to search.

- **Homepage** — search bar prominently above the fold
- **Directory search results** — filterable listings
- **Single listing profile** — the thing being found
- **Submit / Claim a listing** — onboarding for listed members
- **Levels page** — often tiered (free basic listing vs. paid featured listing)

---

## Design Pattern Observations

These patterns appear consistently across real Memberlite sites and are worth weighting in development and design decisions.

**1. One-person expert sites are a dominant pattern.** Six Sigma, PWN, José Enrique, UkeSchool — they need the theme to make them look credible, not corporate. Typography and personal branding matter a lot. The default header and color scheme should feel professional without feeling like a corporation.

**2. Homepage duality is nearly universal.** The logged-out homepage sells; the logged-in homepage serves. The Member Homepages add-on handles this but it could be a native Memberlite pattern (show/hide blocks by membership status). This is a strong candidate for a built-in block pattern or template.

**3. The post-login "members area" landing page is under-designed on most real sites.** It is usually just the Account page. A dedicated members-only dashboard pattern would differentiate Memberlite significantly from generic themes.

**4. The single content template (lesson, article, episode, video) is the most-visited page type on most of these sites.** It deserves a proper pattern with membership gating UI baked in — a teaser zone for non-members and a full-content zone for members.

**5. The Levels / pricing page is where most sites struggle.** The default PMPro Levels page is functional but plain. Well-designed Levels page patterns per site type would be a high-impact addition.

**6. Community orgs with gated content (LERA, Sheldon, Fieldale) are heavy on navigation, member directories, and event listings.** They need clear wayfinding and a "members area" that feels like a real destination, not just a locked page.

**7. Hub-and-spoke / multi-site networks (LERA) show that Memberlite defaults are consistent enough to serve as shared visual identity across many installs.** This is worth preserving — overly opinionated defaults that are hard to reset would break this use case.

**8. International sites (UkeSchool in Dutch, José Enrique in Spanish) use Memberlite without friction.** Layout and structure should remain language-neutral. Avoid hardcoded English labels in templates or patterns.

**9. Event and location-based models (Fieldale, Group Shoot Meetup, Sim360) lean on the theme to surface schedules, locations, and CTAs prominently.** Hero areas, prominent date/location metadata, and clear event-status labeling matter more for these than for content sites.

---

**Last Updated:** 2026-06-16