package group3.csye6200.order.model;



/**
 * Created by hongxili on 4/5/18.
 */


public class Food {
    private String name;
    private String image;
    private String price;
    private String description;
    private String discount;
    private int count;
    public Food()
    {

    }
    public Food(String name,int count)
    {
        this.name=name;
        this.count=count;
    }
    public Food(String name, String image, String price, String description,String discount)
    {
        this.name=name;
        this.image=image;
        this.price=price;
        this.description=description;
        this.discount=discount;
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

    public String getPrice() {
        return price;
    }

    public void setPrice(String price) {
        this.price = price;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getDiscount() {
        return discount;
    }

    public void setDiscount(String discount) {
        this.discount = discount;
    }

    public int getCount() {
        return count;
    }

    public void setCount(int count) {
        this.count = count;
    }
}
