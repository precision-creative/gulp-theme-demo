# Precision Theme

## Adding blocks

To add blocks to the site, you'll first need to:

1. Install Advanced Custom Fields Pro to us its Flexible Content field.
2. Navigate to **Custom Fields > Add New** and add a title for the field group, for example "Blocks".
3. Under Location, create a rule that allows the group to only show when: Page Template is equal to Blocks.
4. Now, add a field using the **+ Add Field** button. Label it whatever you want, something like "Blocks", and make sure the **Field Name** is set to `blocks`. The **Field Type** needs to be set to `Flexible Content`.
5. In the **Layout** row (each one of these is a block), add a field labeled `Text` and a name of `text`. Give it a simple text field labeled whatever you like and named `text` as well. Note: most fields should be required unless there is PHP code making it optional.
6. Save the field group. Now, add this to a page by setting its page template to Blocks. Then, add the block to the page, type something in the text field, and publish / save the page. It should now be displaying on the front end.

A few things to note:

- You can label the fields whatever you want.
- Avoid duplicate field names to keep the database safe. For example, don't have two fields name `text` in the site. Have something like `cta_text` and `hero_text` instead.
