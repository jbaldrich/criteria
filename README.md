# criteria

Criteria::matching(ProductIdFilter::equal(new ProductId()));

Criteria::matchingAll(
    ProductIdFilter::equal(new ProductId()),
    ProductPriceFilter::lessThan(new ProductPrice(10))
);

Criteria::matchingAny(
    ProductIdFilter::equal(new ProductId()),
    ProductPriceFilter::lessThan(new ProductPrice(10))
);

Criteria::matchingAllFilters(
    Filters::withAny(
        ProductIdFilter::equal(new ProductId()),
        ProductPriceFilter::lessThan(new ProductPrice(10))
    ),
    Filters::withAll(
        ProductIdFilter::equal(new ProductId()),
        ProductPriceFilter::lessThan(new ProductPrice(10))
    )
);

Criteria::matchingAnyFilters(
    Filters::withAny(
        ProductIdFilter::equal(new ProductId()),
        ProductPriceFilter::lessThan(new ProductPrice(10))
    ),
    Filters::withAll(
        ProductIdFilter::equal(new ProductId()),
        ProductPriceFilter::lessThan(new ProductPrice(10))
    )
);

Criteria::matching(ProductIdFilter::equal(new ProductId()));

Criteria::matchingAll(
    ProductIdFilter::equal(new ProductId()),
    ProductPriceFilter::lessThan(new ProductPrice(10))
);

Criteria::matchingAny(
    ProductIdFilter::equal(new ProductId()),
    ProductPriceFilter::lessThan(new ProductPrice(10))
);

Criteria::matchingAllFilters(
    Filters::withAny(
        ProductIdFilter::equal(new ProductId()),
        ProductPriceFilter::lessThan(new ProductPrice(10))
    ),
    Filters::withAll(
        ProductIdFilter::equal(new ProductId()),
        ProductPriceFilter::lessThan(new ProductPrice(10))
    )
);

Criteria::matchingAnyFilters(
    Filters::withAny(
        ProductIdFilter::equal(new ProductId()),
        ProductPriceFilter::lessThan(new ProductPrice(10))
    ),
    Filters::withAll(
        ProductIdFilter::equal(new ProductId()),
        ProductPriceFilter::lessThan(new ProductPrice(10))
    )
);