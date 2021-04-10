import org.openqa.selenium.Alert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import java.util.concurrent.TimeUnit;

public class driver {


    public static void main(String[] args) {
        System.setProperty("webdriver.chrome.driver", "C:\\chromedriver.exe");

        WebDriver driver = new ChromeDriver();
        driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);

        driver.get("http://kabum.kinghost.net/login.php");



        WebElement txtUsuario = driver.findElement(By.id("txtUsuario"));
        txtUsuario.sendKeys("chp.programador@gmail.com");

        WebElement txtSenha = driver.findElement(By.id("txtSenha"));
        txtSenha.sendKeys("123");


        WebElement btnEntrar = driver.findElement(By.id("btnEntrar"));
        btnEntrar.click();

        driver.get("http://kabum.kinghost.net/cliente");

        driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);

        WebElement nome = driver.findElement(By.id("nome"));
        nome.sendKeys("João da Silva");

        WebElement cpf = driver.findElement(By.id("cpf"));
        cpf.sendKeys("12312312333");

        WebElement rg = driver.findElement(By.id("rg"));
        rg.sendKeys("123456789");

        WebElement datanascimento = driver.findElement(By.id("data_nascimento"));
        datanascimento.sendKeys("08041983");

        WebElement telefone = driver.findElement(By.id("telefone"));
        telefone.sendKeys("19999998888");


        WebElement cep = driver.findElement(By.id("cep0"));
        cep.sendKeys("13400123");


        WebElement endereco = driver.findElement(By.name("endereco0"));
        endereco.sendKeys("Rua dos Aprovados");

        WebElement numero = driver.findElement(By.id("numero0"));
        numero.sendKeys("1000");

        WebElement complemento = driver.findElement(By.id("complemento0"));
        complemento.sendKeys("Casa");

        WebElement cidade = driver.findElement(By.id("cidade0"));
        cidade.sendKeys("Limeira");

        WebElement estado = driver.findElement(By.id("estado0"));
        estado.sendKeys("SP");

        WebElement Salvar = driver.findElement(By.id("Salvar"));
        Salvar.click();


        WebElement resultadoPesquisa = driver.findElement(By.id("ctl09_GridClientes"));
        String resultado = resultadoPesquisa.getText();
        resultado = resultado.toLowerCase();


        if(resultado.contains("joão da silva")) {
            System.out.println("Cliente cadastrado com sucesso!");
        } else {
            System.out.println("Erro na pesquisa");
            System.out.println("O resultado foi: " + resultado);
        }


        driver.findElement(By.className("btn-danger")).click();
        driver.switchTo().alert().accept();


        resultadoPesquisa = driver.findElement(By.id("ctl09_GridClientes"));
        resultado = resultadoPesquisa.getText();
        resultado = resultado.toLowerCase();

        if(resultado.contains("joão da silva")) {
            System.out.println("Erro ao deletar, elemento ainda encontrado");
        } else {
            System.out.println("Cliente excluído com sucesso!");

        }

        driver.close();
    }



}