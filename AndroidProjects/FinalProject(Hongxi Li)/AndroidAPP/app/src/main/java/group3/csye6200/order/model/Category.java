package group3.csye6200.order.model;

/**
 * Created by hongxili on 4/5/18.
 */

public class Category {
    private String name;
    private String image;

    public Category()
    {

    }

    public Category(String name, String image)
    {
        this.name=name;
        this.image=image;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }
}
